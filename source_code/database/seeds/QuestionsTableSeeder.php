<?php

use Illuminate\Database\Seeder;

use App\Test;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $test = Test::find(1);

        // $questions = ['Сіз мұсылмансыз ба?', 'Немен дәлелдейсіз?', 'Қашаннан бері мұсылмансыз?', 
        //                 'Қалайша мұсылмансыз?', 'Кімнің құлысыз?'
        //             ];

        // $created_questions = [];

        // foreach($questions as $q) {
        //     $question = new Question;
        //     $question -> question = $q;
        //     $question -> type = 'choose';
        //     $question -> test_id = $test->id;
        //     $question->save();
        //     array_push($created_questions, $question);
        // }

        $file = fopen('database/seeds/data/questions.csv', 'r');
        $first_line = 0;
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }
            // print_r($line);

            // $test = Test::find($line[0]);

            $question = new Question;
            $question -> test_id = $line[0];
            // $question -> question_id = $line[1];
            $question -> question = $line[2];
            $question -> type = $line[3];

            $question -> save();
        }
        fclose($file);

    }
}
