<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function show(Request $request)
{
    $user = $request->user(); // same as auth()->user()

    if (! $user) {
        return redirect()->route('login');
    }

    $user->load(['savedBooks', 'reviews.book']);

    return view('user.profile', compact('user'));
}
}