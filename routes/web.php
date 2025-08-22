<?php

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PremiumController;
// Route only for admin
use App\Http\Controllers\ProfileController;
use Laravel\Socialite\Two\AbstractProvider;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadFileController;



    if (!function_exists('adminRoute')) {
        /**
         * Wrap routes for admin-only access
         *
         * @param callable $callback
         * @return \Closure
         */
            function adminRoute(callable $callback) {
                    return function (...$params) use ($callback) {
                        if (!Auth::check()) {
                            return redirect('/login')->with('error', 'Please log in first.');
                        }

                        if (Auth::user()->usertype !== 'admin') {
                            return redirect('/user/profile')->with('error', 'Access denied.');
                        }

                        return $callback(...$params);
                    };
                }
    }

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/user/profile', function () {
    return view('user.profile');
})->name('profile');

Route::get('/admin/dashboard', adminRoute(function () {
    return (new DashboardController())->ViewDashboard();
}))->name('dashboard');

Route::get('/book-create', adminRoute(function () {
    return (new BookController())->create();
}))->name('book-create');

Route::get('/book-list', adminRoute(function () {
    return (new BookController())->index();
}))->name('book-list');

Route::get('/book-category', adminRoute(function () {
    return (new CategoryController())->index();
}))->name('book-category');


Route::get('/book-editor/{book}', adminRoute(function ($book) {
    $book = Book::findOrFail($book);
     // convert ID to model
    return (new BookController())->showBookEditPage($book);
}));

Route::get('/admin/customer-list', adminRoute(function () {
    // Only get users where usertype is 'customer'
    $users = User::where('usertype', 'user')
                 ->orderBy('created_at', 'desc')
                 ->paginate(10);

    return view('admin.customer-list', compact('users'));
}))->name('customer-list');

Route::post('/createBook', [BookController::class,'createBook'])->middleware('auth');

Route::put('/book-editor/{id}', [BookController::class, 'update'])->name('book.update');

Route::delete('/book-delete/{book}', adminRoute(function ($book) {
    // Convert the URL parameter to a Book model instance
    $book = Book::findOrFail($book);
    
    return (new BookController())->DeleteBook($book);
}));

Route::post('/create-category',[CategoryController::class,'createCategory']);

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');

Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::get('/signup', [UserController::class, 'signupView'])->name('signup');
Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::post('/login',[UserController::class,'login']);  
Route::post('/signup', [UserController::class,'signup']); 


Route::get('download',function(){
    return response()->download('C:\Users\L E N O V O\Desktop\test13\public\testing.pdf');
});



Route::put('/categories/{category}', [CategoryController::class, 'editCategory'])->name('categories.update');
Route::delete('/category-delete/{category}', adminRoute(function ($category) {
    // Convert the URL parameter to a Book model instance
    $category = Category::findOrFail($category);
    
    return (new CategoryController())->DeleteCategory($category);
}));

Route::patch('/users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');

Route::get('/admin/premium', adminRoute(function () {
    return (new PremiumController())->index();
}))->name('premium');

Route::post('google/logout', [GoogleAuthController::class,'logout']);


Route::get('/upload', [UploadFileController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [UploadFileController::class, 'uploadFile'])->name('upload.file');

Route::get('/detail',function(){
    return view('detail');
} )->name('detail');


// Book detail page
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show')->middleware('auth');

// Store review
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'show'])
    ->middleware('auth')
    ->name('profile.show');

Route::post('/books/{book}/save', [BookController::class, 'saveBook'])->middleware('auth')->name('books.save');

Route::get('/permium-books', function(){
    $books = Book::all();
    $categories = Category::all();
    return view('user.premium-books',[
        'books'=> $books,
        'categories' => $categories,
    ]);
})->name('premium-books');


Route::get('/upgrade-plan', function(){
    return view('upgrade-plan');
})->name('upgrade-plan');

Route::post('premiumRequest', [PremiumController::class,'premiumRequest'])->name('premiumRequest');