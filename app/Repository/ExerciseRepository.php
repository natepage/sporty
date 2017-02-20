<?php

namespace App\Repository;

use App\Model\Sport\Exercise;

class ExerciseRepository extends ResourceRepository
{
    public function __construct(Exercise $exercise)
    {
        $this->model = $exercise;
    }
}
