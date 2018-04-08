<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        // ラベルではないので1つになる
        return $this->belongsTo(Category::class);
    }
}
