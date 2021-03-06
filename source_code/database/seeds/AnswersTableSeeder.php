<?php

use Illuminate\Database\Seeder;

use App\Question;
use App\Answer;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [
            [
                ['Әл-хамдулил-ләһ, мұсылманмын.', true],
                ['Ya', false],
                ['Jok', false],
                ['Pohodu', false]
            ],
            [
                ['Ya', true],
                ['Әшһаду әллә илаһа иллалаһ. Уә әшхаду әннә Мухаммадән ъабдуһу уә расулуһ', true],
                ['Jok', false],
                ['Pohodu', false]
            ],
            [
                ['20.01.2004', true],
                ['Keshe', false],
                ['Әлимсақтан бері мұсылманбыз.', true],
                ['bilmeim', false]
            ],
            [
                ['a', true],
                ['b', false],
                ['c', false],
                ['Иман келтірумен мұсылманмын.', true]
            ],
            [
                ['Алла Тағаланың құлымын.', true],
                ['Ya', false],
                ['Jok', false],
                ['Pohodu', false]
            ],
        ];
        $ind = 1;
        foreach($answers as $answer) {
            foreach($answer as $ans) 
                Answer::create([
                    'answer' => $ans[0],
                    'is_correct' => $ans[1],
                    'question_id' => $ind
                ]);
            $ind += 1;
        }
    }
}
