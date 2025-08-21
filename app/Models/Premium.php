<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    protected $fillable = [ 'name','email','e_receipt','user_id','is_disabled'];

      public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
