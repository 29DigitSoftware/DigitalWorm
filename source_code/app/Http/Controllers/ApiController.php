<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $count = 0;
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
                    if( !($author -> books()) ) continue;
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

            if($section -> type == 'tests' && count($section_body) < 1 ){
                continue;
            }

            if( count($section_body) < 5 ){
                continue;
            }

            array_push($response['sections'], [
                'id' => $section -> id,
                'sectionType' => $section -> type, 
                'sectionTitle' => $section -> title,
                'sectionBody' => $section_body
            ]);

            $count += 1;
            if( $count > 15 )
                break;
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

    public function get_numbookInsec($id){
        $response = DB::select("select count(*) from books b 
        join book_section bs
        on b.id = bs.book_id
        join sections s on s.id = bs.section_id
        where s.id =".$id);
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200); 
    }
    public function desc_info($id){
        $response = DB::select("select count(authors.id) from sections
        join author_section on author_section.section_id = sections.id
        join authors on authors.id = author_section.author_id
        where sections.id =".$id);
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200); 
    }
    public function get_numAuthorInSec($id){
        $response = DB::select("select books.description from books
        join author_book on books.id = author_book.book_id
        join authors on authors.id = author_book.author_id
        where authors.id =".$id);
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }
    public function get_bookInThisYear(Request $request){
        $response = DB::select("select books.id, books.title, books.description from books
        join author_book on author_book.book_id = books.id
        join authors on authors.id = author_book.author_id
        where year(books.created_at) = ". $request['year'] ."  and authors.id =". $request['id']);
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }
    public function get_NumBooksEachSection(){
        $response = DB::select("select count(books.title), book_section.section_id from books
        join book_section on book_section.book_id = books.id
        where book_section.section_id in (select id from sections)
        group by book_section.section_id");
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }
    public function get_MyBooks(){
        $response = DB::select("select books.id, books.title, books.description from users
        join book_user bu
        on users.id = bu.user_id
        join books on books.id = bu.book_id
        where users.id =".Auth::user()->id);
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }
    public function get_MyBooksInSection(Request $request){
        $response = DB::select("select distinct books.id, books.title, books.description from users
        join book_user bu on users.id =". Auth::user()->id ." and bu.user_id = users.id
        join books on books.id = bu.book_id
        join book_section on books.id = book_section.book_id
        join sections on sections.id = book_section.section_id
        where sections.id =".$request['id']);
        // $response = DB::select("select distinct books.id, books.title, books.description from users
        // join book_user bu on users.id =". Auth::user()->id ." and bu.user_id = users.id
        // join books on books.id = bu.book_id
        // join book_section on books.id = book_section.book_id
        // join sections on sections.id = book_section.section_id
        // where sections.title =".$request['id']);
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }

}