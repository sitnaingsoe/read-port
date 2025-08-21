<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
{
    // Get top 5 books by average rating
            $books = Book::all();
            $categories = Category::all();

                $topBooks = Book::selectRaw('
                books.id, 
                books.name, 
                books.author, 
                books.book_cover, 
                books.description, 
                books.file,
                books.booktype, 
                AVG(reviews.rating) as avg_rating
            ')
            ->join('reviews', 'books.id', '=', 'reviews.book_id')
            ->groupBy(
                'books.id', 
                'books.name', 
                'books.author', 
                'books.book_cover', 
                'books.description', 
                'books.file',
                'books.booktype'
            )
            ->orderByDesc('avg_rating')
            ->take(5)
            ->get();



            return view('welcome', [
                'books' => $books,
                'categories' => $categories,
                'topBooks' => $topBooks
            ]);
        }
}
