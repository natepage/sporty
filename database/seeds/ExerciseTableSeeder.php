<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseTableSeeder extends Seeder
{
    private $exercises = [
        'A' => 12,
        'B' => 2,
        'C' => 9,
        'D' => 0,
        'E' => 7,
        'F' => 3,
        'G' => 0,
        'H' => 0,
        'I' => 8,
        'J' => 3,
        'K' => 3,
        'L' => 0,
        'M' => 1,
        'N' => 1,
        'O' => 0,
        'P' => 0,
        'Q' => 2,
        'R' => 0,
        'S' => 0,
        'T' => 0,
        'U' => 0,
        'V' => 0,
        'W' => 0,
        'X' => 0,
        'Y' => 0,
        'Z' => 0
    ];

    public function run()
    {
        DB::table('exercises')->delete();

        foreach ($this->exercises as $exercise => $number) {
            DB::table('exercises')->insert(['name' => $exercise]);

            if ($number != 0) {
                for ($i = 1; $i <= $number; $i++) {
                    DB::table('exercises')->insert(['name' => $exercise . $i]);
                }
            }
        }
    }
}
