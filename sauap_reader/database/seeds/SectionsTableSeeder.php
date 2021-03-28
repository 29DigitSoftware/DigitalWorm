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
    public function run()
    {
        $sections = ['Жаңа', 'Иман', 'Психология'];

        for ($i = 0; $i < count($sections); $i++) {
            $section = new Section;
            $section -> title = $sections[$i];
            $section -> type = "category";
            $section -> save();

            for ($j = 0; $j < rand(5, 10); $j++) {
                $book = Book::find(rand(1, 72));
                $section->books()->attach($book);
            }
        }
        $sections = ['Авторлар'];

        for ($i = 0, $j = 1; $i < count($sections); $i++, $j++) {
            $section = new Section;
            $section -> title = $sections[$i];
            $section -> type = "authors";
            $section -> save();

            $authors = Author::all();
            $section->authors()->attach($authors);
        }

        $section = new Section;
        $section -> title = "Тесттер";
        $section -> type = "tests";
        $section -> save();

        $tests = Test::all();
        $section->tests()->attach($tests);
        

        $authors = Author::all();
        foreach ($authors as $author) {
            $books = $author -> books();
            $section = new Section;
            $section -> title = $author -> name . ' ' . $author -> surname;
            $section -> type = "author";
            $section -> save();

            foreach($books as $book) {
                $section -> books() -> attach($book);
            }
        }
        
    }
}
