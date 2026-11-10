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
    protected function storeUploadedFile($uploadedFile, string $folder = 'uploads'): string
    {
        $useR2 = filled(config('filesystems.disks.r2.key')) && filled(config('filesystems.disks.r2.bucket')) && filled(config('filesystems.disks.r2.endpoint'));
        $filename = time() . '-' . preg_replace('/\s+/', '-', $uploadedFile->getClientOriginalName());

        if ($useR2) {
            $path = $uploadedFile->storeAs($folder, $filename, 'r2');
            $baseUrl = config('filesystems.disks.r2.url') ?: (rtrim(config('filesystems.disks.r2.endpoint'), '/') . '/' . config('filesystems.disks.r2.bucket'));
            return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
        }

        $path = $uploadedFile->storeAs($folder, $filename, 'public');
        return asset('storage/' . $path);
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
        $incomingFiled['price'] = (int) preg_replace('/[^0-9.]/', '', (string) $incomingFiled['price']);
        $incomingFiled['author'] = strip_tags($incomingFiled['author']);
        $incomingFiled['description'] = strip_tags($incomingFiled['description']);
        $incomingFiled['category_id'] = strip_tags($incomingFiled['category_id']);
        $incomingFiled['booktype'] = strip_tags($incomingFiled['booktype']);

        if ($request->hasFile('book_cover')) {
            $incomingFiled['book_cover'] = $this->storeUploadedFile($request->file('book_cover'), 'uploads/covers');
        } else {
            unset($incomingFiled['book_cover']);
        }

        if ($request->hasFile('file')) {
            $incomingFiled['file'] = $this->storeUploadedFile($request->file('file'), 'uploads/books');
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
        $incomingBook['price'] = (int) preg_replace('/[^0-9.]/', '', (string) $incomingBook['price']);

        if ($request->hasFile('book_cover')) {
            $incomingBook['book_cover'] = $this->storeUploadedFile($request->file('book_cover'), 'uploads/covers');
        }
        if ($request->hasFile('file')) {
            $incomingBook['file'] = $this->storeUploadedFile($request->file('file'), 'uploads/books');
        }
            
        Book::create($incomingBook);
        // Trigger the SweetAlert
        Alert::success('Success!', 'Successfull');
        // Redirect to home
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

        if ($catId = request('category_id')) {
            $query->where('category_id', $catId);
        }

        if ($type = request('booktype')) {
            if ($type === 'premium') {
                $query->whereIn('booktype', ['premiun', 'premium']);
            } elseif ($type === 'free') {
                $query->where('booktype', 'free');
            }
        }

        $books = $query->latest()->paginate(10);
        $categories = Category::all();

        return view('admin.book-list', compact('books', 'categories'));
    }
}
