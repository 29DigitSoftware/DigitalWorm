<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Book;
use App\Author;
use App\Section;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home');
    }

    public function book() {
        $books = Book::all();
        $authors = Author::all();
        $categories = Section::where([['type', '=', 'category']])->get();
        return view('admin.book')->with(['books' => $books, 'authors' => $authors, 'categories' => $categories]);
    }

    public function add_book(Request $request) {
        $author = Author::find($request->get('author'));
        $section = Section::find($request->get('category'));

        $book = new Book();
        $book -> title = $request->get('title');
        $book -> description = $request->get('description');
        $book -> save();

        if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
            $url = "http://127.0.0.1:8000";
        } else {
            $url = $_SERVER['SERVER_NAME'];
        }

        if ($request->hasFile('book')) {
            $epub = $request->file('book');
            $name = 'book.epub';
            $destinationPath = public_path('/books/'.$book->id);
            $epub->move($destinationPath, $name);
            $book->link = $url.'/api/book/'.$book->id;
            $book->save();
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $name = 'cover.'.$cover->getClientOriginalExtension();
            $destinationPath = public_path('/books/'.$book->id);
            $cover->move($destinationPath, $name);
            $book->img = $url.'/api/cover/'.$book->id;
            $book->save();
        }
        
        $author -> books() -> attach($book);
        $section -> books() -> attach($book);
        return back()->with('success', 'Your article has been added successfully. Please wait for the admin to approve.');
    }
}
