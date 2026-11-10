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
            $uploadedFile = $request->file('avatar');
            $filename = time() . '-' . preg_replace('/\s+/', '-', $uploadedFile->getClientOriginalName());
            $useR2 = filled(config('filesystems.disks.r2.key')) && filled(config('filesystems.disks.r2.bucket')) && filled(config('filesystems.disks.r2.endpoint'));

            if ($useR2) {
                $path = $uploadedFile->storeAs('uploads/avatars', $filename, 'r2');
                $baseUrl = config('filesystems.disks.r2.url') ?: (rtrim(config('filesystems.disks.r2.endpoint'), '/') . '/' . config('filesystems.disks.r2.bucket'));
                $user->avatar = rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
            } else {
                $path = $uploadedFile->storeAs('uploads/avatars', $filename, 'public');
                $user->avatar = asset('storage/' . $path);
            }
        }

        $user->save();
        Alert::success('Updated', 'Profile updated successfully!');

        return back()->with('success', 'Profile updated successfully!');
    }
}
