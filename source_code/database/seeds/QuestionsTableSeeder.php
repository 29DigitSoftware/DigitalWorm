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
        $test = Test::find(1);

        $questions = ['Сіз мұсылмансыз ба?', 'Немен дәлелдейсіз?', 'Қашаннан бері мұсылмансыз?', 
                        'Қалайша мұсылмансыз?', 'Кімнің құлысыз?'
                    ];

        $created_questions = [];

        foreach($questions as $q) {
            $question = new Question;
            $question -> question = $q;
            $question -> type = 'choose';
            $question -> test_id = $test->id;
            $question->save();
            array_push($created_questions, $question);
        }
    }
}
