<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";

    /**
     * Function that return books authors info
     */
    public function author() {
        return $this -> belongsToMany(Author::class);
    }

    /**
     * return array of authors Name Surname
     */
    public function authors_name() {
        $authors = $this -> author;
        $res = [];

        foreach($authors as $author) {
            array_push($res, $author->name . ' ' . $author -> surname);
        }

        return $res;
    }

    /**
     * return books sections
     */
    public function sections() {
        $this -> belongsToMany(Section::class);
    }

    /**
     * Function that return users that read this book
     */
    public function users() {
        return $this -> belongsToMany(Author::class);
    }
}
