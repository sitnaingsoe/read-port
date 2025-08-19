<?php

// app/Models/Review.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['book_id', 'user_id', 'rating', 'review'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
