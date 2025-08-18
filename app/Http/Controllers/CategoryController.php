<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{   
      public function DeleteCategory(Category $category){

         $category->books()->delete(); // delete all books first
        $category->delete();

        Alert::success('OK', 'Category and related books deleted');
        return redirect()->route('book-category');
         }
    public function editCategory(Request $request,Category $category){
        
        $incomingFiled = $request->validate(['categoryName'=>'required']);
        $incomingFiled['categoryName'] = strip_tags($incomingFiled['categoryName']);
        $category->update($incomingFiled);
                    Alert::success('congrate','Successfully updated');
        return redirect()->route('book-category');

    }
    public function createCategory(Request $request ){
        $incomingFild  = $request->validate([
            "categoryName"=> "required",
        ]);
        
        Category::create($incomingFild);
        // Trigger the SweetAlert
         Alert::success('Success!', 'Successfull');
        //    Redirect to home
        return redirect("/book-category");
   }
   public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }
}
