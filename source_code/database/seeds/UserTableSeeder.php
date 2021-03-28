<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@mail.ru',
            'password' => Hash::make("123")
        ]);

        $file = fopen('database/seeds/data/users.csv', 'r');
        $first_line = 0;
        $first_line = 0;
        while (($line = fgetcsv($file)) !== FALSE) {

            if( $first_line == 0 ){
                $first_line = 1;
                continue;
            }

        $check = User::where('email', '=', $line[2]);
            if($check != null) {
                continue;
            }  

            // print_r($line);
            $user = new User;
            // $user -> name = $line[1];
            $user -> email = $line[2];
            // $user -> device_id = $line[3];
            // $user -> email_verified = $line[4];
            $user -> password = $line[5];
            // $user -> remember_token = $line[6];
            $user -> save();
        }
        fclose($file);

    }

}
