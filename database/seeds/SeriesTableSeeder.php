<?php

use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('series')->delete();

        for ($i = 1; $i < 21; $i++) {
            $max = $i%3 == 0 ? 10 : 5;

            for ($j = 0; $j < $max; $j++) {
                DB::table('series')->insert([
                    'workout_id' => $i,
                    'exercise_id' => random_int(1, 77),
                    'series' => json_encode([4, 6, 10, 2])
                ]);
            }
        }
    }
}
