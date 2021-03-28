<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facade\FlareClient\Stacktrace\File;

class BookController extends Controller
{
    public function get_book($name) {
        return response()->file('books/'.$name.'/book.epub');
    }

    public function get_cover($name) {
        $cover_name = "";
        if (file_exists('books/'.$name.'/cover.jpg'))
            $cover_name = 'books/'.$name.'/cover.jpg';
        else if (file_exists('books/'.$name.'/cover.png'))
            $cover_name = 'books/'.$name.'/cover.png';
        return response()->file($cover_name);
    }
}