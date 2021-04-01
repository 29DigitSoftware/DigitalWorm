<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function get_search_from_books(Request $req)
    {
        $books = (object)DB::select("select * from books where description like %" . $req->input('fragment') . "% or title like %" . $req->input('fragment') . "%");
        if ($req->input('fragment') == null)
            return response()->json(["message" => "Not found"], 404);
        elseif ($books->isEmpty())
            return response()->json(["message" => "Not found"], 404);
        else {
            $response = [
                'body' => []
            ];
            $user = null;
            if (Auth::guard('sanctum')->check()) {
                $user = Auth::guard('sanctum')->user();
            }

            foreach ($books as $book) {
                $data = [
                    'id' => $book->id,
                    'title' => $book->title,
                    'author' => $book->authors_name()[0],
                    'description' => $book->description,
                    'img' => $book->img
                ];
                if ($user != null) {
                    if ($user->hasBook($book))
                        $data['is_added'] = true;
                    else
                        $data['is_added'] = false;
                }
                array_push($response['body'], $data);
            }
            return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
        }
    }
}
