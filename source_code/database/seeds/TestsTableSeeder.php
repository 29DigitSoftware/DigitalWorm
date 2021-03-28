<?php

use Illuminate\Database\Seeder;

use App\Test;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $file = fopen('database/seeds/data/tests.csv', 'r');
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }

            //$line is an array of the csv elements
            // print_r($line);
            $test = new Test;
            $test -> title = $line[1];
            $test -> progress = 0;
            // $test -> img = $line[2];
            $test -> save();
        }
        fclose($file);

        // $titles = ['Иман', 'ТАҒДЫР', 'ПАЙҒАМБАР', 'ӨНЕГЕ', 'ҮЙЛЕНУ', 'ПАРЫЗДАР'];

        // foreach($titles as $title) {
        //     Test::create([
        //         'title' => $title,
        //         'progress' => 0
        //     ]);
        // }
    }
}
