<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function author(){
        return $this->belongeTo(Author::class , 'author_id' , 'id');
    }

    public function category(){
        return $this->belongeTo(Category::class , 'category_id' , 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class , 'article_id' , 'id');
    }
}
