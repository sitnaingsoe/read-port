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
        //if(Auth::user()->id != $book['']){
        //    return redirect("/");
        //}
            $categories = Category::all();

            return view('admin.book-editor', [
            'book' => $book,
            'categories' => $categories,
        ]);
    }
    public function UpdateBook(Book $book, Request $request){
        //if(Auth::user()->id != $book->user_id){
        //    return redirect("/");
        //}
                    $incomingFiled = $request->validate([
                    'name'=>'required',
                    'price'=> 'required',
                    'author'=> 'required',
                    'description'=> 'required',
                    'category'=> 'required',
                        ]);

                    $incomingFiled['name'] = strip_tags($incomingFiled['name']);
                    $incomingFiled['price'] = strip_tags($incomingFiled['price']);
                    $incomingFiled['description'] = strip_tags($incomingFiled['description']);
                    $incomingFiled['category'] = strip_tags($incomingFiled['category']);
                    $book->update($incomingFiled);
                    Alert::success('congrate','Successfully updated');
                    return redirect('/book-list');
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
            if ($request->hasFile('book_cover')) {
            // Store the file
            $path = $request->file('book_cover')->storePublicly('uploads', 'spaces');

            // Generate the URL
            $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');

            // Add the file URL into the array
            $incomingBook['book_cover'] = $url;
            }
             if ($request->hasFile('file')) {
            $filename = time() . '-' . $request->file('file')->getClientOriginalName();
            $path = 'uploads/' . $filename;

            Storage::disk('spaces')->put(
                $path,
                fopen($request->file('file')->getRealPath(), 'r'),
                'public'
            );

            $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');

             $incomingBook['file'] = $url;
        }
            
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
