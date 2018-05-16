<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'is_done', 'user_id'];

    protected $casts = [
        'is_done' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
