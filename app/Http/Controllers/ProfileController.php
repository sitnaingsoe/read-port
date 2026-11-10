<?php

namespace App\Http\Controllers;

use App\Models\Premium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->load(['savedBooks.category', 'reviews.book']);
        $pendingPremium = Premium::where('user_id', $user->id)
            ->where('is_disabled', false)
            ->latest()
            ->first();

        return view('user.profile', compact('user', 'pendingPremium'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        $user->name = strip_tags($validated['name']);

        if ($request->hasFile('avatar')) {
            $useSpaces = filled(env('AWS_ACCESS_KEY_ID')) && filled(env('AWS_BUCKET'));
            if ($useSpaces) {
                $path = $request->file('avatar')->storePublicly('uploads/avatars', 'spaces');
                $user->avatar = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');
            } else {
                $path = $request->file('avatar')->store('uploads/avatars', 'public');
                $user->avatar = asset('storage/' . $path);
            }
        }

        $user->save();
        Alert::success('Updated', 'Profile updated successfully!');

        return back()->with('success', 'Profile updated successfully!');
    }
}
