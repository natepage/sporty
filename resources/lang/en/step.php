<?php

return [
    'title' => 'Steps',
    'actions' => [
        'add' => 'Add',
        'remove' => 'Remove'
    ],
    'fields' => [
        'exercise' => 'Exercise',
        'nb_series' => 'Series',
        'nb_repetitions' => 'Repetitions',
        'pace' => [
            'name' => 'Pace',
            'slow' => 'Slow',
            'normal' => 'Normal',
            'fast' => 'Fast'
        ],
        'rest_between' => 'Rest between',
        'rest_between_unit' => 'Rest between unit',
        'rest_after' => 'Rest after',
        'rest_after_unit' => 'Rest after unit',
        'order' => 'Order'
    ],
    'show' => [
        'rest_after' => 'Rest :time :unit after.'
    ]
];
