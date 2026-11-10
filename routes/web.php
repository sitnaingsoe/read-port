<?php

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PremiumController;
// Route only for admin
use Laravel\Socialite\Two\AbstractProvider;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', function () {
    $query = Book::with('reviews', 'category');
    if ($search = request('search')) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('author', 'like', "%{$search}%");
        });
    }
    $books = $query->latest()->get();
    $categories = Category::all();
    return view('welcome', [
        'books' => $books,
        'categories' => $categories,
    ]);
})->name('home');
Route::get('/user/profile', [ProfileController::class, 'show'])->name('profile');
Route::post('/user/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

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
    $query = User::where('usertype', 'user')
                 ->withCount(['reviews', 'savedBooks']);

    if ($search = request('search')) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }

    if (request('status') === 'premium') {
        $query->where('is_premium', true);
    } elseif (request('status') === 'standard') {
        $query->where('is_premium', false);
    }

    $users = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('admin.customer-list', compact('users'));
}))->name('customer-list');

Route::post('/createBook', [BookController::class,'createBook'])->middleware('auth');

Route::put('/book-editor/{book}',[BookController::class,'UpdateBook'])->middleware('auth');

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
Route::match(['get', 'post'], '/logout', [UserController::class, 'logout'])->name('logout');
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
Route::patch('/premium/{premium}/reject', [PremiumController::class, 'reject'])->name('premium.reject')->middleware('auth');
Route::patch('/users/{user}/toggle-premium', [UserController::class, 'togglePremium'])->name('users.toggle-premium')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
Route::post('/books/{book}/save', [BookController::class, 'toggleSave'])->name('books.save')->middleware('auth');

Route::get('/admin/premium', adminRoute(function () {
    return (new PremiumController())->index();
}))->name('premium');

Route::post('google/logout', [GoogleAuthController::class,'logout']);


Route::get('/upload', [UploadFileController::class, 'showUploadForm'])->name('upload.form')->middleware('auth');
Route::post('/upload', [UploadFileController::class, 'uploadFile'])->name('upload.file')->middleware('auth');

Route::get('/detail',function(){
    return view('detail');
} )->name('detail');


// Book detail page
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Store review
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');;



Route::get('/review-form',function(){
    return view('review');
})->middleware('auth');