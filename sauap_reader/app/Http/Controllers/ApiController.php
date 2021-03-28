<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Book;
use App\Section;
use App\Author;
use App\Question;
use App\Answer;
use App\Test;

class ApiController extends Controller
{ 
    
    public function get_book($id) {
        $user = null;
        if (Auth::guard('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
        }

        $book = Book::find($id);//->first(['id', 'title', 'description', 'img', 'link']);
        if ($book == null)
            return response()->json(["message" => "Not found"], 404);
        else {
            $response = [
                'id' => $book -> id,
                'title' => $book -> title,
                'description' => $book -> description,
                'img' => $book -> img,
                'link' => $book -> link,
                'author' => $book->authors_name(),
                'authors' => []
            ];
            foreach($book->author as $author) {
                array_push($response['authors'], [
                    'id' => $author->id,
                    'name' => $author->name . ' ' . $author->surname,
                    'title' => $author->title
                ]);
            }

            if ($user != null) {
                if ($user->hasBook($book)) {
                    $response['is_added'] = true;
                    $response['progress'] = $user->books()->find($book->id)->pivot->progress;
                } else
                    $response['is_added'] = false;
            }

            return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
        }
    }

    public function get_sections() {
        $response = ['sections' => []];
        $sections = Section::whereIn('type', ['category', 'authors', 'tests'])->get();
        $user = null;
        if (Auth::guard('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
        }

        foreach($sections as $section) {
            $section_body = [];
            if ($section -> type == 'category') {
                foreach($section->books as $book) {
                    $data = [
                        'id' => $book -> id,
                        'title' => $book -> title, 
                        'author' => $book->authors_name(),
                        'img' => $book -> img,
                        'description' => $book -> description,
                    ];
                    if ($user != null) {
                        if ($user->hasBook($book))
                            $data['is_added'] = true;
                        else
                            $data['is_added'] = false;
                    }
                    array_push($section_body, $data);
                }
            } else if ($section -> type == 'authors') {
                foreach($section->authors as $author) {
                    array_push($section_body, [
                        'id' => $author -> id,
                        'name' => $author -> name, 
                        'surname' => $author -> surname,
                        'title' => $author -> title
                    ]);
                }
            } else if ($section -> type == 'tests') {
                foreach($section->tests as $test) {
                    array_push($section_body, [
                        'id' => $test -> id,
                        'title' => $test -> title, 
                        'img' => $test -> img,
                        'progress' => $test -> progress
                    ]);
                }
            }
            array_push($response['sections'], [
                'id' => $section -> id,
                'sectionType' => $section -> type, 
                'sectionTitle' => $section -> title,
                'sectionBody' => $section_body
            ]);
        }

        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }

    /**
     * return sections content
     */
    public function get_section_info($id) {
        $response = [
            'title' => '',
            'body' => []
        ];
        $user = null;
        if (Auth::guard('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
        }
        
        $section = Section::where([['id', '=', $id]])->first();
        if ($section == null) {
            return response()->json(["message" => "Not found"], 404);
        }

        $response['title'] = $section -> title;
        if ($section -> type == 'category') {
            foreach($section->books as $book) {
                $data = [
                    'id' => $book -> id,
                    'title' => $book -> title, 
                    'author' => $book->authors_name()[0],
                    'img' => $book -> img,
                    'description' => $book -> description,
                ];
                if ($user != null) {
                    if ($user->hasBook($book))
                        $data['is_added'] = true;
                    else
                        $data['is_added'] = false;
                }
                array_push($response['body'], $data);
            }
        } else if ($section -> type == 'authors') {
            foreach($section->authors as $author) {
                $authors_books = [];
                foreach($author->books as $book) {
                    array_push($authors_books, [
                        'id' => $book -> id,
                        'title' => $book -> title, 
                        'img' => $book -> img,
                        'description' => $book -> description,
                    ]);
                }
                array_push($response['body'], [
                    'id' => $author -> id,
                    'name' => $author -> name, 
                    'surname' => $author -> surname,
                    'title' => $author -> title,  
                    'books' => $authors_books
                ]);
            }
        } else if ($section -> type == 'tests') {
            foreach($section->tests as $test) {
                array_push($response['body'], [
                    'id' => $test -> id,
                    'title' => $test -> title, 
                    'img' => $test -> img,
                    'progress' => $test -> progress
                ]);
            }
        }
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }

    /**
     * Return test questions with answers
     */
    public function get_test_info($id) {
        $response = [
            'title' => '',
            'questions' => []
        ];

        $test_title = Test::find($id)->title;
        $response['title'] = $test_title;

        $questions = Question::where([['test_id', '=', $id]])->get();
        foreach($questions as $question) {
            $answers = Answer::where([['question_id', '=', $question->id]])->get(['id', 'answer', 'is_correct']);
            array_push($response['questions'], ['question' => $question -> question, 'type' => $question -> type, 'answers' => $answers]);
        }

        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }

    /**
     * function that return authors info and their books
     */
    public function author_info($id) {
        $author = Author::where([['id', '=', $id]])->first();
        
        if ($author == null) {
            return response()->json(["message" => "Not found"], 404);
        }

        $user = null;
        if (Auth::guard('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
        }

        $authors_books = [];
        foreach($author->books as $book) {
            $data = [
                'id' => $book -> id,
                'title' => $book -> title, 
                'description' => $book -> description,
                'img' => $book -> img
            ];
            if ($user != null) {
                if ($user->hasBook($book))
                    $data['is_added'] = true;
                else
                    $data['is_added'] = false;
            }
            array_push($authors_books, $data);
        }

        $response = [
            "name" => $author -> name,
            "surname" => $author -> surname,
            "books" => $authors_books
        ];

        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200); 
    }

    /*
        Return user profile info
    */
    public function get_profile() {
        $user = Auth::user();
        
        $resp = [
            'email' => $user->email,
            'books' => $user->books()->get(['id', 'title', 'img'])->makeHidden('pivot')
        ];

        return $resp;
    }

    /*
        Method that add book to users library
    */
    public function library_add(Request $request) {
        $response = [
            'message' => ''
        ];
        $book = Book::find($request -> book_id);

        if ($book == null) {
            $response['message'] = 'No such book';
            return response(json_encode($response, JSON_UNESCAPED_UNICODE), 404); 
        }

        $user = Auth::user();
        if (! $user -> hasBook($book)) {
            $user -> books() -> attach([$book -> id]);
            $user->save();
        }

        $response['message'] = 'Success';
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }

    /**
     * Method that delete book from users library
     */
    public function library_delete(Request $request) {
        $response = [
            'message' => ''
        ];
        $book = Book::find($request -> book_id);

        if ($book == null) {
            $response['message'] = 'No such book';
            return response(json_encode($response, JSON_UNESCAPED_UNICODE), 404); 
        }

        $user = Auth::user();
        if ($user -> hasBook($book)) {
            $user -> books() -> detach($book->id);
            $user->save();
        }

        $response['message'] = 'Success';
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }

    /*
        Save book progress
    */
    public function book_progress(Request $request) {
        $book = Book::find($request -> book_id);

        if ($book == null) {
            $response['message'] = 'No such book';
            return response(json_encode($response, JSON_UNESCAPED_UNICODE), 404); 
        }

        $user = Auth::user();
        if (! $user->hasBook($book)) {
            $response['message'] = 'Please, add this book to library';
            return response(json_encode($response, JSON_UNESCAPED_UNICODE), 404); 
        }

        $user -> books() -> updateExistingPivot($book, ['progress' => $request->progress], false);

        $response['message'] = 'Success';
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }

    /**
     * Return books progrss
     */
    public function get_book_progress(Request $request) {
        dd($request);
        $book = Book::find($request -> book_id);

        if ($book == null) {
            $response['message'] = 'No such book';
        } else if (Auth::user()->hasBook($book)) {
            $response['progress'] = Auth::user()->books()->find($book->id)->pivot->progress;
        } else {
            $response['message'] = 'Please, add this book to library';
        }

        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 404); 
    }

    /**
     * Return all books in users library
     */
    public function get_library_books() {
        $response = [
            'books' => []
        ];

        foreach(Auth::user()->books as $book) {
            array_push($response['books'], [
                'id' => $book -> id,
                'title' => $book -> title, 
                'description' => $book -> description,
                'img' => $book -> img
            ]);
        }
        
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }
}
