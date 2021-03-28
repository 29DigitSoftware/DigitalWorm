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
        $titles = ['Иман', 'ТАҒДЫР', 'ПАЙҒАМБАР', 'ӨНЕГЕ', 'ҮЙЛЕНУ', 'ПАРЫЗДАР'];

        foreach($titles as $title) {
            Test::create([
                'title' => $title,
                'progress' => 0
            ]);
        }
    }
}
