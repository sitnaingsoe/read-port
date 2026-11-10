<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Premium;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function ViewDashboard()
    {
        $stats = [
            'total_books'      => Book::count(),
            'total_categories' => Category::count(),
            'total_customers'  => User::where('usertype', 'user')->count(),
            'premium_users'    => User::where('usertype', 'user')->where('is_premium', true)->count(),
            'pending_premium'  => Premium::where('is_disabled', false)->count(),
            'total_reviews'    => Review::count(),
        ];

        $recentBooks = Book::with('category')->latest()->take(5)->get();
        $recentUsers = User::where('usertype', 'user')->latest()->take(5)->get();
        $admin = Auth::user();

        return view('admin.dashboard', compact('stats', 'recentBooks', 'recentUsers', 'admin'));
    }
}
