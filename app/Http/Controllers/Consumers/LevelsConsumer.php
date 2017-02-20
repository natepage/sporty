<?php

namespace App\Http\Controllers\Consumers;

use App\Repository\LevelRepository;

trait LevelsConsumer
{
    /** @var LevelRepository */
    protected $levelRepository;

    protected function getFormatedLevels(): array
    {
        $levels = [];

        foreach ($this->levelRepository->all() as $level) {
            $levels[$level->id] = $level->name;
        }

        return $levels;
    }
}
