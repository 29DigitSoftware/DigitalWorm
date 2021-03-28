<?php

use Illuminate\Database\Seeder;

use App\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents("database/seeds/result.json"), true);
        for ($i = 1; $i < 73; $i++) {
            if ($data[$i]['title'] == null) echo $i;
            Book::create([
                'title' => ($data[$i]['title'] != null) ? $data[$i]['title'] : 'Аты жоқ',
                'description' => $data[$i]['description'],
                'img' => 'https://digitalworm.prosthesis.kz/api/cover/'.($i),//route('get_cover', ['name' => $i + 1]),
                'link' => 'https://digitalworm.prosthesis.kz/api/book/'.($i),//route('get_book', ['name' => $i + 1])
                // 'img' => 'http://127.0.0.1:8000/api/cover/'.($i),//route('get_cover', ['name' => $i + 1]),
                // 'link' => 'http://127.0.0.1:8000/api/book/'.($i),//route('get_book', ['name' => $i + 1])
                // 'img' => 'https://reader.prosthesis.kz/api/cover/'.($i + 1),//route('get_cover', ['name' => $i + 1]),
                // 'link' => 'https://reader.prosthesis.kz/api/book/'.($i + 1),//route('get_book', ['name' => $i + 1])
            ]);
        }
    }
}
