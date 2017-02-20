<?php

use Illuminate\Database\Seeder;

class StepTableSeeder extends Seeder
{
    private $steps = [
         1 => [ //Level I: first program
            [ 2, 2,  8,   2, 'min',   2, 'min', 'normal',  10],
            [27, 2, 10,   2, 'min',   2, 'min', 'normal',  20],
            [18, 2, 10,   2, 'min',   2, 'min',   'fast',  30],
            [28, 2, 60,   2, 'min',   2, 'min', 'normal',  40],
            [36, 2, 20,   2, 'min',   2, 'min', 'normal',  50],
            [40, 2, 20,   2, 'min',   2, 'min', 'normal',  60],
            [57, 2, 15,   2, 'min',   2, 'min', 'normal',  70]
        ],
         2 => [ //Level I: second program
            [14, 3,  8,   2, 'min',   2, 'min', 'normal',  10],
            [ 2, 3,  8,   2, 'min',   2, 'min', 'normal',  20],
            [27, 1, 10,   2, 'min',   2, 'min', 'normal',  30],
            [18, 3, 15,   2, 'min',   2, 'min',   'fast',  40],
            [28, 3, 15,   2, 'min',   2, 'min', 'normal',  50],
            [36, 3, 20,   2, 'min',   2, 'min', 'normal',  60],
            [40, 3, 20,   2, 'min',   2, 'min', 'normal',  70],
            [57, 3, 15,   2, 'min',   2, 'min', 'normal',  80]
        ],
         3 => [ //Level II
            [15, 6,  5,  25, 'sec',  25, 'sec',   'fast',  10],
            [ 4, 6,  5,  25, 'sec',  25, 'sec',   'fast',  20],
            [ 3, 6,  5,  25, 'sec',   3, 'min',   'fast',  30],
            [18, 6,  5,  25, 'sec',   3, 'min',   'fast',  40],
            [28, 6,  5,  25, 'sec',   3, 'min',   'fast',  50],
            [36, 4,  5,  25, 'sec',   3, 'min', 'normal',  60],
            [40, 6, 10,  25, 'sec', 1.3, 'min', 'normal',  70],
            [41, 6,  1,  25, 'sec',   1, 'min', 'normal',  80],
            [57, 3, 15,   1, 'min',   1, 'min', 'normal',  90]
        ],
         4 => [ //Level III
            [16, 6,  4,  25, 'sec',  25, 'sec',   'fast',  10],
            [ 4, 6,  4,  25, 'sec',  25, 'sec',   'fast',  20],
            [ 3, 6,  4,  25, 'sec',   3, 'min',   'fast',  30],
            [19, 6,  4,  25, 'sec',   3, 'min',   'fast',  40],
            [31, 6,  4,  25, 'sec',   2, 'min',   'fast',  50],
            [36, 4,  4,  25, 'sec',   3, 'min', 'normal',  60],
            [40, 6, 10,  25, 'sec', 1.3, 'min', 'normal',  70],
            [41, 6,  1,  25, 'sec',   1, 'min', 'normal',  80],
            [57, 3, 15,   1, 'min',   1, 'min', 'normal',  90]
        ],
         5 => [ //Level IV
            [14, 6,  3,  25, 'sec',  25, 'sec', 'normal',  10],
            [ 4, 6,  3,  25, 'sec',  25, 'sec', 'normal',  20],
            [ 3, 6,  3,  25, 'sec',   3, 'min', 'normal',  30],
            [20, 6,  3,  25, 'sec',   3, 'min', 'normal',  40],
            [30, 6,  3,  25, 'sec',   3, 'min', 'normal',  50],
            [36, 4,  5,  25, 'sec',   2, 'min', 'normal',  60],
            [40, 6, 10,  25, 'sec', 1.3, 'min', 'normal',  70],
            [41, 6,  1,  25, 'sec',   1, 'min', 'normal',  80],
            [57, 3, 15,   1, 'min',   1, 'min', 'normal',  90]
        ],
         6 => [ //Level V
            [14, 2,  8,   2, 'min',   3, 'min',   'fast',  10],
            [ 3, 2, 10,   2, 'min',   3, 'min', 'normal',  20],
            [17, 2, 10,   2, 'min',   3, 'min', 'normal',  30],
            [30, 6,  3,  25, 'sec',   3, 'min', 'normal',  40],
            [36, 4,  5,  25, 'sec',   2, 'min', 'normal',  50],
            [40, 6, 10,  25, 'sec', 1.3, 'min', 'normal',  60],
            [41, 6,  1,  25, 'sec',   1, 'min', 'normal',  70],
            [57, 3, 15,   1, 'min',   1, 'min', 'normal',  80],
            [77, 1, 10,   1, 'min',   1, 'min', 'normal',  90]
        ],
         7 => [ //Level VI
            [15, 6,  5,  25, 'sec',  25, 'sec',   'fast',  10],
            [ 4, 6,  4,  25, 'sec',  25, 'sec',   'fast',  20],
            [ 3, 6,  5,  25, 'sec',   4, 'min',   'fast',  30],
            [42, 6,  3,  25, 'sec',  25, 'sec',   'fast',  40],
            [18, 6,  3,  25, 'sec',   3, 'min',   'fast',  50],
            [30, 6,  3,  25, 'sec',   3, 'min', 'normal',  60],
            [36, 4,  5,  25, 'sec',   2, 'min', 'normal',  70],
            [40, 6, 10,  25, 'sec', 1.3, 'min', 'normal',  80],
            [41, 6,  1,  25, 'sec',   1, 'min', 'normal',  90],
            [57, 3, 15,   1, 'min',   1, 'min', 'normal', 100],
            [77, 1, 10,   1, 'min',   1, 'min', 'normal', 110]
        ],
         8 => [ //Level VII
            [15, 6,  5,  25, 'sec',  25, 'sec', 'normal',  10],
            [ 4, 6,  4,  25, 'sec',  25, 'sec', 'normal',  20],
            [ 3, 6,  5,  25, 'sec',   4, 'min', 'normal',  30],
            [43, 6,  4,  25, 'sec',  25, 'sec',   'fast',  40],
            [20, 6,  4,  25, 'sec',   3, 'min', 'normal',  50],
            [51, 1, 10,  25, 'sec',   2, 'min', 'normal',  60],
            [55, 1, 10,  25, 'sec',   2, 'min', 'normal',  70],
            [59, 1, 10,  25, 'sec',   2, 'min', 'normal',  80],
            [46, 1, 10,  25, 'sec',   2, 'min', 'normal',  90],
            [47, 1, 10,  25, 'sec',   3, 'min', 'normal', 100],
            [30, 6,  3,  25, 'sec',   3, 'min', 'normal', 110],
            [36, 4,  5,  25, 'sec',   2, 'min', 'normal', 120],
            [40, 6, 10,  25, 'sec', 1.3, 'min', 'normal', 130],
            [41, 6,  1,  25, 'sec',   1, 'min', 'normal', 140],
            [57, 3, 15,   1, 'min',   1, 'min', 'normal', 150],
            [77, 1, 10,   1, 'min',   1, 'min', 'normal', 160]
        ],
         9 => [ //Level VIII: first workout
            [14, 6,  8,  25, 'sec',  25, 'sec', 'normal',  10],
            [51, 6,  4,  25, 'sec',  25, 'sec', 'normal',  20],
            [ 8, 3,  4,  25, 'sec',  25, 'sec', 'normal',  30],
            [ 2, 3,  4,  25, 'sec',   4, 'min', 'normal',  40],
            [43, 6,  4,  25, 'sec',  25, 'sec',   'fast',  50],
            [20, 6,  4,  25, 'sec',   3, 'min', 'normal',  60],
            [30, 6,  3,  25, 'sec',   3, 'min', 'normal',  70],
            [40, 6, 10,  25, 'sec', 1.3, 'min', 'normal',  80],
            [41, 6,  1,  25, 'sec',   1, 'min', 'normal',  90],
            [77, 1, 10,   1, 'min',   1, 'min', 'normal', 100]
        ],
        10 => [ //Level VIII: second workout
            [59, 1,  8, 1.3, 'min', 1.3, 'min', 'normal',  10],
            [51, 2,  8, 1.3, 'min', 1.3, 'min', 'normal',  20],
            [55, 4,  8, 1.3, 'min', 1.3, 'min', 'normal',  30],
            [ 7, 2,  8, 1.3, 'min', 1.3, 'min', 'normal',  40],
            [40, 6, 10,  25, 'sec', 1.3, 'min', 'normal',  50],
            [46, 2,  8, 1.3, 'min', 1.3, 'min', 'normal',  60],
            [47, 2,  8, 1.3, 'min', 1.3, 'min', 'normal',  70],
            [48, 2,  8, 1.3, 'min', 1.3, 'min', 'normal',  80],
            [36, 4,  5,  25, 'sec',   2, 'min', 'normal',  90],
            [57, 3, 15,   1, 'min',   1, 'min', 'normal', 100],
            [60, 6,  4,   1, 'min',   1, 'min', 'normal', 110],
        ],
        11 => [ //Level IX
            [15, 1, 20,   5, 'sec',   5, 'sec',   'fast',  10],
            [14, 1, 20,   5, 'sec', 1.3, 'min', 'normal',  20],
            [43, 3,  8, 1.3, 'min', 1.3, 'min',   'fast',  30],
            [51, 1, 25,   5, 'sec', 1.3, 'min',   'fast',  40],
            [40, 1, 20, 1.3, 'min', 1.3, 'min',   'fast',  50],
            [55, 1, 25,   5, 'sec', 1.3, 'min',   'fast',  60],
            [20, 1, 20, 1.3, 'min', 1.3, 'min',   'fast',  70],
            [ 7, 1, 25,   5, 'sec', 1.3, 'min',   'fast',  80],
            [41, 1, 20, 1.3, 'min', 1.3, 'min',   'fast',  90],
            [ 8, 1, 25,   5, 'sec', 1.3, 'min',   'fast', 100],
            [60, 3,  8, 1.3, 'min', 1.3, 'min',   'fast', 110],
            [59, 3,  8, 1.3, 'min', 1.3, 'min',   'fast', 120],
            [57, 3, 15,   1, 'min',   1, 'min', 'normal', 130],
            [36, 5,  5,  25, 'sec',   2, 'min', 'normal', 140],
            [77, 1, 10,   1, 'min',   1, 'min', 'normal', 150]
        ],
        12 => [ //Level X: first workout
            [15, 1, 20,   5, 'sec',  25, 'sec',   'fast',  10],
            [14, 5, 20,  25, 'sec',  25, 'sec', 'normal',  20],
            [51, 6, 25,  25, 'sec',  25, 'sec', 'normal',  30],
            [ 7, 6, 25,  25, 'sec',  25, 'sec', 'normal',  40],
            [ 8, 3, 25,  25, 'sec', 1.3, 'min', 'normal',  50],
            [40, 6, 25,  25, 'sec', 1.3, 'min', 'normal',  60],
            [59, 2, 25, 1.3, 'min', 1.3, 'min', 'normal',  70],
            [57, 2, 15,   1, 'min',   1, 'min', 'normal',  80],
            [56, 1, 15,   1, 'min',   1, 'min', 'normal',  90],
            [55, 4, 25, 1.3, 'min', 1.3, 'min', 'normal', 100],
            [36, 5,  5,  25, 'sec',   2, 'min', 'normal', 110],
            [77, 1, 10,   1, 'min',   1, 'min', 'normal', 120]
        ],
        13 => [ //Level X: second workout
            [49, 3, 20,  25, 'sec',  25, 'sec',   'fast',  10],
            [20, 2, 20,  25, 'sec',  25, 'sec',   'fast',  20],
            [47, 2, 20,  25, 'sec', 1.3, 'min', 'normal',  30],
            [41, 6, 20,  25, 'sec',   2, 'min',   'fast',  40],
            [48, 3, 20, 1.3, 'min',   2, 'min', 'normal',  50],
            [46, 3, 20, 1.3, 'min',   2, 'min', 'normal',  60],
            [47, 3, 20, 1.3, 'min',   2, 'min', 'normal',  70],
            [62, 4, 20, 1.3, 'min',   1, 'min', 'normal',  80],
            [30, 6,  3,  25, 'sec',   2, 'min', 'normal',  90],
            [60, 2, 20, 1.3, 'min', 1.3, 'min', 'normal', 100],
            [64, 2, 20, 1.3, 'min', 1.3, 'min', 'normal', 110],
        ]
    ];

    public function run()
    {
        DB::table('steps')->delete();

        foreach ($this->steps as $lvlId => $steps) {
            foreach ($steps as $step){
                DB::table('steps')->insert([
                    'level_id' => $lvlId,
                    'exercise_id' => $step[0],
                    'nb_series' => $step[1],
                    'nb_repetitions' => $step[2],
                    'rest_between' => $step[3],
                    'rest_between_unit' => $step[4],
                    'rest_after' => $step[5],
                    'rest_after_unit' => $step[6],
                    'pace' => $step[7],
                    'order' => $step[8]
                ]);
            }
        }
    }
}
