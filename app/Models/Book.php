<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    use  HasFactory;
    
  protected $fillable = [ 'name','price','author','description','book_cover','file','category_id','booktype'];

      public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
  
}
