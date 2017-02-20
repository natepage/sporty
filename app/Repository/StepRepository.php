<?php

namespace App\Repository;

use App\Model\Sport\Step;

class StepRepository extends ResourceRepository
{
    public function __construct(Step $step)
    {
        $this->model = $step;
    }
}
