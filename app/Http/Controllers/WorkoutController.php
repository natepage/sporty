<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Consumers\ExercisesConsumer;
use App\Http\Controllers\Consumers\LevelsConsumer;
use App\Model\Sport\Workout;
use App\Repository\ExerciseRepository;
use App\Repository\LevelRepository;
use App\Repository\WorkoutRepository;

class WorkoutController extends ResourceController
{
    use ExercisesConsumer, LevelsConsumer;

    /** @var string */
    protected $resource = 'workout';

    protected $rules = [
        'level_id' => 'numeric',
        'series.*.exercise_id' => 'numeric',
        'series.*.series.*' => 'numeric'
    ];

    public function __construct(
        WorkoutRepository $workoutRepository,
        Workout $workout,
        ExerciseRepository $exerciseRepository,
        LevelRepository $levelRepository
    )
    {
        parent::__construct();

        $this->repository = $workoutRepository;
        $this->model = $workout;
        $this->exerciseRepository = $exerciseRepository;
        $this->levelRepository = $levelRepository;
    }

    public function setLevelAction($id)
    {
        session(['workout_level_id' => $id]);

        return redirect()->route($this->getRoute('create'));
    }

    protected function getFormData(): array
    {
        return [
            'exercises' => $this->getFormatedExercises(),
            'levels' => $this->getFormatedLevels()
        ];
    }

    protected function preCreate(array $viewData): array
    {
        $item = $viewData['item'];

        if (session('workout_level_id')) {
            $item->level_id = session('workout_level_id');
            session()->forget('workout_level_id');
        } elseif(null !== $first = $this->model->first()) {
            $viewData['item'] = $item = $first;
        } else {
            $item->level_id = 1;
        }

        $viewData['level'] = $this->levelRepository->getById($item->level_id);

        return $viewData;
    }

    protected function preEdit(array $viewData): array
    {
        $item = $viewData['item'];

        $viewData['level'] = $this->levelRepository->getById($item->level_id);

        return $viewData;
    }
}
