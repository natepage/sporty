<?php

namespace App\Http\Controllers;

use App\Model\Athlete\Measurements;
use App\Repository\MeasurementsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MeasurementsController extends ResourceController
{
    protected $resource = 'measurements';

    protected $rules = [
        'weight' => 'required|numeric',
        'feeling' => 'string|nullable',
        'sholders' => 'numeric|nullable',
        'chest' => 'numeric|nullable',
        'waist' => 'numeric|nullable',
        'left_arm' => 'numeric|nullable',
        'right_arm' => 'numeric|nullable',
        'left_thigh' => 'numeric|nullable',
        'right_thigh' => 'numeric|nullable',
        'left_calf' => 'numeric|nullable',
        'right_calf' => 'numeric|nullable'
    ];

    public function __construct(MeasurementsRepository $measurementsRepository, Measurements $measurements)
    {
        parent::__construct();

        $this->repository = $measurementsRepository;
        $this->model = $measurements;
    }

    public function removeRemind(Request $request)
    {
        $request->session()->remove('need_measurements');

        return new Response('OK');
    }
}
