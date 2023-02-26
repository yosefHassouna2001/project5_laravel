<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    public function viewer(){
        return $this->belongsTo(Viewer::class , 'viewer_id' , 'id');
    }

    public function article(){
        return $this->belongsTo(Article::class , 'article_id' , 'id');
    }

    public function users(){
        return $this->hasMany(User::class , 'city_id' , 'id');
    }
}
