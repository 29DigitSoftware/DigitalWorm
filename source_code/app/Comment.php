<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'body',
        'book_id',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');//or user_id
    }
}
