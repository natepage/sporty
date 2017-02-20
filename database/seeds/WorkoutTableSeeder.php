<?php

use Illuminate\Database\Seeder;

class WorkoutTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('workouts')->delete();

        for ($i = 0; $i < 20; $i++) {
            DB::table('workouts')->insert([
                'level_id' => random_int(1, 13)
            ]);
        }
    }
}
