<?php

use Illuminate\Database\Seeder;

use App\Author;
use App\Book;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = fopen('database/seeds/data/authors.csv', 'r');
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }
            //$line is an array of the csv elements
            // print_r($line);
            $author = new Author;
            $author -> name = $line[1];
            $author -> surname = $line[2];
            // $author -> avatar = $line[3];
            $author -> title = $line[4];
            $author -> save();
        }
        fclose($file);

        $file = fopen('database/seeds/data/author_book.csv', 'r');
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }
            // print_r($line);
            $author = Author::find($line[1]);
            if( $author == null )
                continue;

            $book = Book::find($line[2]);
            if( $book == null )
                continue;

            $author->books()->attach($book);
        }
        fclose($file);

        // $data = json_decode(file_get_contents("database/seeds/result.json"), true);
        // $used = [];
        // foreach ($data as $key => $value) {
        //     if ($value['creator'] == null) continue;
            
        //     $ns = explode(' ', $value['creator']);

        //     if (! in_array($ns[0] . $ns[1], $used)) {
        //         array_push($used, $ns[0] . $ns[1]);
        //         $author = new Author;
        //         $author -> name = $ns[0];
        //         $author -> surname = $ns[1];
        //         $author -> title = 'Дінтанушы';
        //         $author -> save();
        //     } else {
        //         $author = Author::where([['name', '=', $ns[0]], ['surname', '=', $ns[1]]])->first();
        //     }

        //     $book = Book::find($key);
        //     $author->books()->attach($book);
        // }
    }
}
