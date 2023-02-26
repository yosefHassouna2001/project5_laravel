<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    public function user(){
        return $this->morphOne(User::class ,'actor', 'actor_type' , 'actor_id', 'id');
    }
    public function articles(){
        return $this->hasMany(Article::class , 'author_id' , 'id');
    }
}
