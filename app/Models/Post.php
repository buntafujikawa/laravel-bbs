<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function category()
    {
        // ラベルではないので1つになる
        return $this->belongsTo('App\Models\Category');
    }
}
