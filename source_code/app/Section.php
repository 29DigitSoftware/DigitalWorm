<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    /**
     * Return books in section
     */
    public function books() {
        return $this -> belongsToMany(Book::class);
    }


    /**
     * Return authors in section
     */
    public function authors() {
        return $this -> belongsToMany(Author::class);
    }

    /**
     * Return tests in section
     */
    public function tests() {
        return $this->belongsToMany(Test::class);
    }
}
