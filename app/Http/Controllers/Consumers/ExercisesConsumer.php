<?php

namespace App\Http\Controllers\Consumers;

use App\Repository\ExerciseRepository;

trait ExercisesConsumer
{
    /** @var ExerciseRepository */
    protected $exerciseRepository;

    protected function getFormatedExercises(): array
    {
        $exercises = [];

        foreach ($this->exerciseRepository->all() as $exercise) {
            $exercises[$exercise->id] = $exercise->name;
        }

        return $exercises;
    }
}
