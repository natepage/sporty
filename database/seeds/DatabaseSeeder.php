<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(MeasurementTableSeeder::class);
        $this->call(ExerciseTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(StepTableSeeder::class);
        //$this->call(WorkoutTableSeeder::class);
        //$this->call(SeriesTableSeeder::class);
    }
}
