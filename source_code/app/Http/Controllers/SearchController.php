<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Book;

class SearchController extends Controller
{
    public function get_search_from_books(Request $req) {
        $books = Book::where('title', 'like', '%' . $req->input('fragment') . '%')->paginate(5);

        if ($req->input('fragment') == null)
            return response()->json(["message" => "Not found"], 404);
        elseif($books-> isEmpty())
            return response()->json(["message" => "Not found"], 404);
        else {
            $response = [
                'body' => []
            ];
            $user = null;
            if (Auth::guard('sanctum')->check()) {
                $user = Auth::guard('sanctum')->user();
            }

            foreach($books as $book){
                $data = [
                    'id' => $book -> id,
                    'title' => $book -> title, 
                    'author' => $book->authors_name()[0],
                    'description' => $book -> description,
                    'img' => $book -> img
                ];
                if ($user != null) {
                    if ($user->hasBook($book))
                        $data['is_added'] = true;
                    else
                        $data['is_added'] = false;
                }
                array_push($response['body'], $data);
            }

            $books['body'] = $response['body'];
            return response(json_encode($books, JSON_UNESCAPED_UNICODE), 200);
        }
    }
}
// state.searchResult.data.body = state.searchResult.data.body.concat(oldData);
// state.searchResult.data.body = state.searchResult.data.body.concat(oldData);