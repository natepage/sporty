<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MeasurementTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('measurements')->delete();

        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('measurements')->insert([
                'sholders' => rand(20, 150),
                'left_arm' => rand(20, 150),
                'right_arm' => rand(20, 150),
                'chest' => rand(20, 150),
                //'waist' => rand(20, 150),
                'left_thigh' => rand(20, 150),
                'right_thigh' => rand(20, 150),
                'left_calf' => rand(20, 150),
                //'right_calf' => rand(20, 150),
                'weight' => rand(80, 100),
                'user_id' => 1,
                'feeling' => $faker->text(150)
            ]);
        }
    }
}
