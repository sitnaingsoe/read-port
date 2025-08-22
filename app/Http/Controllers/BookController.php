<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use App\Models\Category;
class BookController extends Controller
{       
    public function saveBook(Book $book)
{
    $user = Auth::user();
    if ($user->savedBooks->contains($book->id)) {
        $user->savedBooks()->detach($book->id);
    } else {
        $user->savedBooks()->attach($book->id);
    }
    return back();
}
      public function show($id)
    {
        $book = Book::with('reviews')->findOrFail($id);
        $averageRating = $book->reviews->avg('rating');

        return view('show', compact('book', 'averageRating'));
    }
    public function showBookEditPage(Book $book){
       
            $categories = Category::all();

            return view('admin.book-editor', [
            'book' => $book,
            'categories' => $categories,
        ]);
    }
        public function update(Request $request, $id)
        {
            $book = Book::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'author' => 'required|string|max:255',
                'description' => 'required|string',
                'category' => 'required|exists:categories,id',
                'booktype' => 'required|in:premium,free',
                'book_cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'file' => 'nullable|mimes:pdf|max:10000',
            ]);

            // Update basic fields
            $book->name = $request->name;
            $book->price = $request->price;
            $book->author = $request->author;
            $book->description = $request->description;
            $book->category_id = $request->category;
            $book->booktype = $request->booktype;

            // Update Cover Image if uploaded
            if ($request->hasFile('book_cover')) {
                // Delete old cover if exists
                if ($book->book_cover && Storage::disk('public')->exists($book->book_cover)) {
                    Storage::disk('public')->delete($book->book_cover);
                }
                // Store new cover
                $book->book_cover = $request->file('book_cover')->store('books/covers', 'public');
            }

            // Update PDF file if uploaded
            if ($request->hasFile('file')) {
                // Delete old PDF if exists
                if ($book->file && Storage::disk('public')->exists($book->file)) {
                    Storage::disk('public')->delete($book->file);
                }
                // Store new PDF
                $book->file = $request->file('file')->store('books/files', 'public');
            }

            // Save changes
            $book->save();

            return redirect()->back()->with('success', 'Book updated successfully!');
        }
    public function createBook (Request $request){

        $incomingBook = $request->validate([
            "name"=>"required",
            "price" => "required",
            "author" => "required",
            "description" => "required",
            'book_cover' =>'required|file|max:2048',           
            'file' => 'required|file|max:2048',
            'category_id' => 'required',
            'booktype'=>'required'
        ]);   
            $incomingBook['book_cover'] = $request->file('book_cover')->store('books/covers', 'public');
            $incomingBook['file'] = $request->file('file')->store('books/files', 'public');
            
        //    if ($request->hasFile('book_cover')) {
        //    // Store the file
        //    $path = $request->file('book_cover')->storePublicly('uploads', 'spaces');

        //    // Generate the URL
        //    $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');

        //    // Add the file URL into the array
        //    $incomingBook['book_cover'] = $url;
        //    }
        //     if ($request->hasFile('file')) {
        //    $filename = time() . '-' . $request->file('file')->getClientOriginalName();
        //    $path = 'uploads/' . $filename;

        //    Storage::disk('spaces')->put(
        //        $path,
        //        fopen($request->file('file')->getRealPath(), 'r'),
        //        'public'
        //    );

        //    $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');

        //     $incomingBook['file'] = $url;
        //}
            
         Book::create($incomingBook);
        // Trigger the SweetAlert
         Alert::success('Success!', 'Successfull');
        //    Redirect to home
        return redirect("/book-list");
    } 
    public function DeleteBook(Book $book){
              $book->delete();  
            Alert::success('OK','You are deleted');
            return redirect('/book-list') ;
         }

         public function create()
    {
        $categories = Category::all();
        return view('admin.book-create', compact('categories'));
    }

    public function index()
    {
        $books = Book::with('category')->get();
        return view('admin.book-list', compact('books'));
    }
}
