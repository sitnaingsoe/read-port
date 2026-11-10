<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;

class GoogleAuthController extends Controller
{
    public function redirect(Request $request)
    {
        if (empty(config('services.google.client_id')) || empty(config('services.google.client_secret'))) {
            return redirect()->route('login')->with(
                'error',
                'Google Sign-In is not configured yet. Please add GOOGLE_CLIENT_ID and GOOGLE_CLIENT_SECRET in your .env file.'
            );
        }

        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        try {
            /** @var AbstractProvider $driver */
            $driver = Socialite::driver('google');
            if (app()->environment('local')) {
                $driver->setHttpClient(new \GuzzleHttp\Client(['verify' => false]));
            }
            $googleUser = $driver->stateless()->user();
        } catch (\Throwable $e) {
            return redirect()->route('login')->with('error', 'Google authentication failed: ' . $e->getMessage());
        }

        /** @var \App\Models\User|null $user */
        $user = User::where('google_id', $googleUser->id)
            ->orWhere('email', $googleUser->email)
            ->first();

        if ($user) {
            $user->google_id = $googleUser->id;
            if (empty($user->avatar) && !empty($googleUser->avatar)) {
                $user->avatar = $googleUser->avatar;
            }
            $user->save();
        } else {
            $user = User::create([
                'name'      => $googleUser->name ?? $googleUser->nickname ?? 'Google User',
                'email'     => $googleUser->email,
                'google_id' => $googleUser->id,
                'avatar'    => $googleUser->avatar,
                'password'  => Hash::make(Str::random(16)),
                'usertype'  => 'user',
            ]);
        }

        Auth::login($user);

        // Generate token
        $token = $user->createToken('google-login')->plainTextToken;

        // Determine redirect route
        $redirectTo = ($user->usertype === 'admin')
            ? route('dashboard')
            : route('profile');

        // Return a Blade view that stores token in localStorage, then redirects
        return view('auth.google-success', [
            'token'      => $token,
            'redirectTo' => $redirectTo,
            'user'       => $user
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); 
    }
}
