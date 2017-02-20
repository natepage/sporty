<?php

namespace App\Repository;

use App\Model\Sport\Level;

class LevelRepository extends ResourceRepository
{
    /** @var StepRepository */
    protected $stepRepository;

    public function __construct(Level $level, StepRepository $stepRepository)
    {
        $this->model = $level;
        $this->stepRepository = $stepRepository;
    }

    public function store(array $inputs)
    {
        $level = parent::store($inputs);

        foreach ($inputs['steps'] as $step) {
            $this->stepRepository->store(array_merge($step, ['level_id' => $level->id]));
        }
    }

    public function update($id, array $inputs)
    {
        parent::update($id, $inputs);

        $level = $this->getById($id);

        foreach ($level->steps as $step) {
            if (isset($inputs['steps']) && array_key_exists($step->id, $inputs['steps'])) {
                $this->stepRepository->update($step->id, $inputs['steps'][$step->id]);

                unset($inputs['steps'][$step->id]);
            } else {
                $this->stepRepository->destroy($step->id);
            }
        }

        if (isset($inputs['steps'])) {
            foreach ($inputs['steps'] as $step) {
                $this->stepRepository->store(array_merge($step, ['level_id' => $level->id]));
            }
        }
    }
}
