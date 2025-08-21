<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class GoogleAuthController extends Controller
{
    public function redirect(Request $request){
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request){
        /** @var AbstractProvider $driver */
        $driver = Socialite::driver('google');
        $googleUser = $driver->stateless()->user();
        $avatarUrl = $googleUser->getAvatar();
          if ($avatarUrl) {
            // Get image content from Google
            $avatarContents = Http::get($avatarUrl)->body();

            // Create unique filename
            $filename = 'avatars/' . Str::random(40) . '.jpg';

            // Store in storage/app/public/avatars
            Storage::disk('public')->put($filename, $avatarContents);

            $avatarPath = $filename; // save this to DB
        } else {
            $avatarPath = null;
        }

        /** @var \App\Models\User $user */
            $user = User::updateOrCreate(
                ['google_id' => $googleUser->id],
                [
                    'name'     => $googleUser->name ?? $googleUser->nickname ?? 'No Name',
                    'email'    => $googleUser->email,
                    'password' => Hash::make(Str::random(12)),
                    'avatar'   => $avatarPath, // stored path
                ]
            );

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
