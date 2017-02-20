<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Consumers\ExercisesConsumer;
use App\Model\Sport\Level;
use App\Repository\ExerciseRepository;
use App\Repository\LevelRepository;

class LevelController extends ResourceController
{
    use ExercisesConsumer;

    /** @var string */
    protected $resource = 'level';

    /** @var array */
    protected $rules = [
        'name' => 'string',
        'steps' => 'array',
        'steps.*.level_id' => 'integer',
        'steps.*.exercise_id' => 'integer',
        'steps.*.nb_series' => 'integer',
        'steps.*.nb_repetitions' => 'integer',
        'steps.*.pace' => 'in:slow,normal,fast',
        'steps.*.order' => 'integer',
        'steps.*.rest_between' => 'numeric',
        'steps.*.rest_between_unit' => 'in:sec,min',
        'steps.*.rest_after' => 'numeric',
        'steps.*.rest_after_unit' => 'in:sec,min'
    ];

    public function __construct(LevelRepository $levelRepository, Level $level, ExerciseRepository $exerciseRepository)
    {
        parent::__construct();

        $this->repository = $levelRepository;
        $this->model = $level;
        $this->exerciseRepository = $exerciseRepository;

        $this->middleware('admin')->except(['index', 'show']);
    }

    protected function getFormData(): array
    {
        return [
            'exercises' => $this->getFormatedExercises()
        ];
    }
}
