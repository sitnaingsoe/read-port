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
        $incomingFiled = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'author' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'booktype' => 'required',
            'book_cover' => 'nullable|file|max:10240',
            'file' => 'nullable|file|max:20480',
        ]);

        $incomingFiled['name'] = strip_tags($incomingFiled['name']);
        $incomingFiled['price'] = strip_tags($incomingFiled['price']);
        $incomingFiled['author'] = strip_tags($incomingFiled['author']);
        $incomingFiled['description'] = strip_tags($incomingFiled['description']);
        $incomingFiled['category_id'] = strip_tags($incomingFiled['category_id']);
        $incomingFiled['booktype'] = strip_tags($incomingFiled['booktype']);

        $useSpaces = filled(env('AWS_ACCESS_KEY_ID')) && filled(env('AWS_BUCKET'));

        if ($request->hasFile('book_cover')) {
            if ($useSpaces) {
                $path = $request->file('book_cover')->storePublicly('uploads', 'spaces');
                $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');
            } else {
                $path = $request->file('book_cover')->store('uploads', 'public');
                $url = asset('storage/' . $path);
            }
            $incomingFiled['book_cover'] = $url;
        } else {
            unset($incomingFiled['book_cover']);
        }

        if ($request->hasFile('file')) {
            $filename = time() . '-' . $request->file('file')->getClientOriginalName();
            $path = 'uploads/' . $filename;

            if ($useSpaces) {
                Storage::disk('spaces')->put(
                    $path,
                    fopen($request->file('file')->getRealPath(), 'r'),
                    'public'
                );
                $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');
            } else {
                Storage::disk('public')->putFileAs('uploads', $request->file('file'), $filename);
                $url = asset('storage/' . $path);
            }
            $incomingFiled['file'] = $url;
        } else {
            unset($incomingFiled['file']);
        }

        $book->update($incomingFiled);
        Alert::success('congrate', 'Successfully updated');
        return redirect('/book-list');
    }
    public function createBook (Request $request){

        $incomingBook = $request->validate([
            "name"=>"required",
            "price" => "required",
            "author" => "required",
            "description" => "required",
            'book_cover' =>'required|file|max:10240',           
            'file' => 'required|file|max:20480',
            'category_id' => 'required',
            'booktype'=>'required'
        ]);     
        $useSpaces = filled(env('AWS_ACCESS_KEY_ID')) && filled(env('AWS_BUCKET'));

        if ($request->hasFile('book_cover')) {
            if ($useSpaces) {
                $path = $request->file('book_cover')->storePublicly('uploads', 'spaces');
                $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');
            } else {
                $path = $request->file('book_cover')->store('uploads', 'public');
                $url = asset('storage/' . $path);
            }
            $incomingBook['book_cover'] = $url;
        }
        if ($request->hasFile('file')) {
            $filename = time() . '-' . $request->file('file')->getClientOriginalName();
            $path = 'uploads/' . $filename;

            if ($useSpaces) {
                Storage::disk('spaces')->put(
                    $path,
                    fopen($request->file('file')->getRealPath(), 'r'),
                    'public'
                );
                $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');
            } else {
                Storage::disk('public')->putFileAs('uploads', $request->file('file'), $filename);
                $url = asset('storage/' . $path);
            }

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

    public function toggleSave(Book $book)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $toggled = $user->savedBooks()->toggle($book->id);

        if (!empty($toggled['attached'])) {
            Alert::success('Saved', 'Book saved to your profile!');
        } else {
            Alert::info('Removed', 'Book removed from your saved list.');
        }

        return back();
    }

         public function create()
    {
        $categories = Category::all();
        return view('admin.book-create', compact('categories'));
    }

    public function index()
    {
        $query = Book::with('category');
        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }
        $books = $query->latest()->get();
        return view('admin.book-list', compact('books'));
    }
}
