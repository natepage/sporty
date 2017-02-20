<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    private $lvls = [
        'Level I: first program',
        'Level I: second program',
        'Level II',
        'Level III',
        'Level IV',
        'Level V',
        'Level VI',
        'Level VII',
        'Level VIII: first workout',
        'Level VIII: second workout',
        'Level IX',
        'Level X: first workout',
        'Level X: second workout',
        'Level XI: first workout',
        'Level XI: second workout',
        'Level XII: first workout',
        'Level XII: second workout',
        'Level XIII: first workout',
        'Level XIII: second workout'
    ];

    public function run()
    {
        DB::table('levels')->delete();

        foreach ($this->lvls as $lvl) {
            DB::table('levels')->insert([
                'name' => $lvl
            ]);
        }
    }
}
