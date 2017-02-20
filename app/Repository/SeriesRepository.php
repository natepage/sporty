<?php

namespace App\Repository;

use App\Model\Sport\Series;

class SeriesRepository extends ResourceRepository
{
    function __construct(Series $series)
    {
        $this->model = $series;
    }
}
