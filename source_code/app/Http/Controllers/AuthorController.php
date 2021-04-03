<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function author() {
        $authors = (object)DB::select("select * from authors");
        return view('admin.author')->with(['authors' => $authors]);
    }
    public function add_author(Request $request) {
        $author = new Author();
        $author -> name = $request->get('name');
        $author -> surname = $request->get('surname');
        $author -> title = $request->get('title');
        $author -> save();

        if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
            $url = "http://127.0.0.1:8000";
        } else {
            $url = $_SERVER['SERVER_NAME'];
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $name = 'avatar.'.$cover->getClientOriginalExtension();
            $destinationPath = public_path('/author/'.$author->id);
            $cover->move($destinationPath, $name);
            $author->img = $url.'/api/author/img'.$author->id;
            $author->save();
        }
        return back()->with('success', 'Your article has been added successfully. Please wait for the admin to approve.');
    }
    public function destroy_author($id)
    {
        $author = (object)DB::select("select * from authors where id =".$id);
        $author->delete();

        return redirect('/admins/authors')->with('success', 'Contact deleted!');
    }
    public function update_author_page($id) {
        $author = (object)DB::select("select * from authors where id =".$id);

        return view('admin.updateauthor')->with(compact('author'));
    }
    public function update_author(Request $request, $id)
    {
        $author = (object)DB::select("select * from authors where id =".$id);

        $author ->update($request->only(['name','surname']));
        $author ->title = $request->get('title');
        $author -> save();

        if ($_SERVER['SERVER_NAME'] == '127.0.0.1') {
            $url = "http://127.0.0.1:8000";
        } else {
            $url = $_SERVER['SERVER_NAME'];
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $name = 'avatar.'.$cover->getClientOriginalExtension();
            $destinationPath = public_path('/author/'.$author->id);
            $cover->move($destinationPath, $name);
            $author->img = $url.'/api/author/img'.$author->id;
            $author->save();
        }
        return redirect('/admins/authors')->with('success', 'Contact updated!');
    }
    public function get_cover($id) {
        $cover_name = "";
        if (file_exists('author/'.$id.'/avatar.jpg'))
            $cover_name = 'author/'.$id.'/avatar.jpg';
        else if (file_exists('author/'.$id.'/avatar.png'))
            $cover_name = 'author/'.$id.'/avatar.png';
        return response()->file($cover_name);
    }
}