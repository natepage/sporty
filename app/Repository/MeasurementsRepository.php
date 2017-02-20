<?php

namespace App\Repository;

use App\Model\Athlete\Measurements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeasurementsRepository extends ResourceRepository
{
    public function __construct(Measurements $measurements)
    {
        $this->model = $measurements;
    }

    public function store(array $inputs)
    {
        $data = array_merge($inputs, ['user_id' => Auth::id()]);

        return $this->model->create($data);
    }
}
