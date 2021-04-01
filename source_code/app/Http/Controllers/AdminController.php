<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home');
    }

    public function book() {
        $books = (object)DB::select("select * from books");
        $authors = (object)DB::select("select * from authors");
        $categories = (object)DB::select("select * from sections where type = 'category'");
        
        return view('admin.book')->with(['books' => $books, 'authors' => $authors, 'categories' => $categories]);
    }

    public function add_book(Request $request) {
        $author = (object)DB::select("select * from authors where id =".$request->get('author'));
        $section = (object)DB::select("select * from sections where id =".$request->get('category'));

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

    public function update_book_page($id) {
        $book = (object)DB::select("select * from books where id=".$id);
        $authors = DB::select("select * from authors");
        $categories = (object)DB::select("select * from sections where type = 'category'");

        return view('admin.updatebook')->with(compact('book','authors','categories'));
    }
    public function update_book(Request $request, $id)
    {
        $book = (object)DB::select("select * from books where id=".$id);
        $author = (object)DB::select("select * from authors where id =".$request->get('author'));
        $section = (object)DB::select("select * from sections where id =".$request->get('category'));

        $book->title =  $request->get('title');
        $book->description = $request->get('description');

        $book->save();

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
        
        return redirect('/admins/books')->with('success', 'Contact updated!');
    }

    public function destroy_book($id)
    {
        $book = (object)DB::select("select * from books where id=".$id);
        $book->delete();

        return redirect('/admins/books')->with('success', 'Contact deleted!');
    }
}