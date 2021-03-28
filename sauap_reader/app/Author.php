<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    /**
     * Function that return authors books
     */
    public function books() {
        return $this -> belongsToMany(Book::class);
    }

    /**
     * return sections sections
     */
    public function sections() {
        $this -> belongsToMany(Section::class);
    }
}
