<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review; // Make sure you have Review model
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{

    public function store(Request $request)
{
    // Validate request
    $validated = $request->validate([
        'book_id' => 'required|integer|exists:books,id',
        'rating'  => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:1000',
    ]);

    // Check if user logged in
    $userId = Auth::id();
    if (!$userId) {
        Alert::error('Oops', 'Please sign up or log in first.');
        return redirect()->back();
    }

    // Prevent duplicate review
    $existing = Review::where('user_id', $userId)
                      ->where('book_id', $validated['book_id'])
                      ->first();

    if ($existing) {
        Alert::warning('Notice', 'You already reviewed this book.');
        return redirect()->back();
    }

    // Save review
    Review::create([
        'user_id' => $userId,
        'book_id' => $validated['book_id'],
        'rating'  => $validated['rating'],
        'comment' => $validated['comment'],
    ]);

    Alert::success('Success', 'Review submitted successfully!');
    return redirect()->back();
}
}
