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
        $data = json_decode(file_get_contents("database/seeds/result.json"), true);
        $used = [];
        foreach ($data as $key => $value) {
            if ($value['creator'] == null) continue;
            
            $ns = explode(' ', $value['creator']);

            if (! in_array($ns[0] . $ns[1], $used)) {
                array_push($used, $ns[0] . $ns[1]);
                $author = new Author;
                $author -> name = $ns[0];
                $author -> surname = $ns[1];
                $author -> title = 'Дінтанушы';
                $author -> save();
            } else {
                $author = Author::where([['name', '=', $ns[0]], ['surname', '=', $ns[1]]])->first();
            }

            $book = Book::find($key);
            $author->books()->attach($book);
        }
        /*
        $names = ["Abylay", "Bekzat", "Nauka"];
        $surnames = ['Omar', 'Yernat', 'Sapargali'];
        $titles = ['Дінтанушы', 'Блоггер', 'Мезунжы'];

        for ($i = 0, $j = 1; $i < count($names); $i++, $j++) {
            $author = new Author;
            $author -> name = $names[$i];
            $author -> surname = $surnames[$i];
            $author -> title = $titles[$i];
            $author -> save();
            
            $book = Book::find(rand(1, 72));
            $author->books()->attach($book);
            $book = Book::find(rand(1, 72));
            $author->books()->attach($book);
        }
        */
    }
}
