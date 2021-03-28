<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facade\FlareClient\Stacktrace\File;

class TestController extends Controller
{
    // public function get_book($name) {
    //     return response()->file('books/'.$name.'/book.epub');
    // }

    public function get_icon($id) {
        $icon = "";
        if (file_exists('img/test_'.$id.'.png'))
            $icon = 'img/test_'.$id.'.png';
        return response()->file($icon);
    }
}