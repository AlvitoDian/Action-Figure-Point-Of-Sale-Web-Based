<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
    
    public function user(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }
}
