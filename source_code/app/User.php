<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Function that return users reading books
     */
    public function books() {
        return $this -> belongsToMany(Book::class)->withPivot(['progress']);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Is selected book exists
     */
    public function hasBook($book) {
        return $this -> books -> contains($book);
    }
}
