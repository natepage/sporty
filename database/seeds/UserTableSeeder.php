<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Nathan Page',
            'email' => 'nathan.page86@gmail.com',
            'password' => bcrypt('nathan'),
            'admin' => true
        ]);
    }
}
