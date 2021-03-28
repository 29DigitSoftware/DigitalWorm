<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        
        $this->call(BookSeeder::class);
        $this->call(AuthorsTableSeeder::class);

        $this->call(UserTableSeeder::class);

        

        $this->call(SectionsTableSeeder::class);
    }
}