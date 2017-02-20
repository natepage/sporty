<?php

namespace App\Repository;

use App\Model\Sport\Workout;

class WorkoutRepository extends ResourceRepository
{
    /** @var SeriesRepository */
    protected $seriesRepository;

    function __construct(Workout $workout, SeriesRepository $seriesRepository)
    {
        $this->model = $workout;
        $this->seriesRepository = $seriesRepository;
    }

    public function store(array $inputs)
    {
        $workout = parent::store($inputs);

        $this->storeSeries($workout->id, $inputs);
    }

    public function update($id, array $inputs)
    {
        parent::update($id, $inputs);

        $workout = $this->getById($id);

        foreach ($workout->series as $serie) {
            $serie->delete();
        }

        $this->storeSeries($id, $inputs);
    }

    private function storeSeries(int $id, array $inputs)
    {
        foreach ($inputs['series'] as $series) {
            $this->seriesRepository->store(array_merge($series, ['workout_id' => $id]));
        }
    }
}
