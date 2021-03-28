<?php

use App\Author;
use Illuminate\Database\Seeder;

use App\Section;
use App\Book;
use App\Test;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {

    //     $sections = ['Жаңа', 'Иман', 'Психология'];

    //     for ($i = 0; $i < count($sections); $i++) {
    //         $section = new Section;
    //         $section -> title = $sections[$i];
    //         $section -> type = "category";
    //         $section -> save();

    //         for ($j = 0; $j < rand(5, 10); $j++) {
    //             $book = Book::find(rand(1, 72));
    //             $section->books()->attach($book);
    //         }
    //     }
    //     $sections = ['Авторлар'];

    //     for ($i = 0, $j = 1; $i < count($sections); $i++, $j++) {
    //         $section = new Section;
    //         $section -> title = $sections[$i];
    //         $section -> type = "authors";
    //         $section -> save();

    //         $authors = Author::all();
    //         $section->authors()->attach($authors);
    //     }

    //     $section = new Section;
    //     $section -> title = "Тесттер";
    //     $section -> type = "tests";
    //     $section -> save();

    //     $tests = Test::all();
    //     $section->tests()->attach($tests);
        

    //     $authors = Author::all();
    //     foreach ($authors as $author) {
    //         $books = $author -> books();
    //         $section = new Section;
    //         $section -> title = $author -> name . ' ' . $author -> surname;
    //         $section -> type = "author";
    //         $section -> save();

    //         foreach($books as $book) {
    //             $section -> books() -> attach($book);
    //         }
    //     }
        
    // }

    public function run()
    {
        $file = fopen('database/seeds/data/sections.csv', 'r');
        $first_line = 0;
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }
            // print_r($line);
            $section = new Section;
            $section -> title = $line[1];
            $section -> type = $line[2];
            $section -> save();

        }
        fclose($file);
    
        $file = fopen('database/seeds/data/section_authors.csv', 'r');
        $first_line = 0;
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }
            // print_r($line);
            $section = Section::find($line[0]);
            $author = Author::find($line[1]);
            
            $section -> type = 'authors';
            $section->authors()->attach($author);
            
            $section -> save();
        }
        fclose($file);

        $file = fopen('database/seeds/data/section_author.csv', 'r');
        $first_line = 0;
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }
            // print_r($line);
            $section = Section::find($line[0]);
            $section -> type = 'author';

            $author = Author::find($line[1]);        
            $section -> title = $author -> name . ' ' . $author -> surname;

            $books = $author -> books();
            foreach($books as $book) {
                $section -> books() -> attach($book);
            }

            $section -> save();
        }
        fclose($file);

        $file = fopen('database/seeds/data/section_books.csv', 'r');
        $first_line = 0;
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }
            // print_r($line);
            $section = Section::find($line[0]);
            $book = Book::find($line[1]);
            
            $section -> type = 'category';
            $section->books()->attach($book);
            
            $section -> save();
        }
        fclose($file);

        $file = fopen('database/seeds/data/section_tests.csv', 'r');
        $first_line = 0;
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }
            // print_r($line);
            $section = Section::find($line[0]);
            $test = Test::find($line[1]);
            if( $test == null )
                continue;

            $section -> type = 'tests';
            $section->tests()->attach($test);
            
            $section -> save();
        }
        fclose($file);
    }

}
