<?php

return [
    'breadcrumbs' => [
        'index'  => 'Measurements',
        'create' => 'Add a measurement',
        'edit'   => 'Measurements :item edition',
        'show'   => 'Measurements :item'
    ],
    'empty' => 'No measurements yet...',
    'no_body_data' => 'No body data available...',
    'no_feeling' => 'No feeling available... That\'s sad...',
    'fields' => [
        'sholders' => 'Sholders',
        'left_arm' => 'Left arm',
        'right_arm' => 'Right arm',
        'chest' => 'Chest',
        'waist' => 'Waist',
        'left_thigh' => 'Left thigh',
        'right_thigh' => 'Right thigh',
        'left_calf' => 'Left calf',
        'right_calf' => 'Right calf',
        'weight' => 'Weight',
        'feeling' => [
            'present' => 'How do you feel?',
            'past' => 'How did you feel?'
        ],
        'images' => 'Images'
    ],
    'form' => [
        'titles' => [
            'body' => 'Body',
            'top' => 'Top',
            'bottom' => 'Bottom',
            'general' => 'General'
        ],
        'images' => [
            'labels' => [
                'browse' => 'Browse',
                'drag_and_drop' => 'Drag and drop here...',
                'remove' => 'Remove'
            ]
        ]
    ],
    'actions' => [
        'create' => 'Create',
        'show' => 'Show',
        'edit' => 'Edit',
        'destroy' => 'Delete'
    ],
    'ask' => [
        'destroy' => [
            'title' => 'Would you like to delete this measurement?',
            'content' => 'You wont be able to undo it after.',
            'ok' => 'Do it',
            'cancel' => 'Sounds like mistake'
        ],
        'remind' => [
            'title' => 'Record your measurements',
            'content' => [
                'empty' => 'You have no measurements recorded yet, that\'s a good way to appreciate your progress 
                            so let\'s record your first one!',
                'a_while' => 'You didn\'t record your measurements for a while... What about your body? 
                              Your feeling? Go record it to keep your motivation growing!'
            ],
            'ok' => 'Do it now',
            'cancel' => 'Next time'
        ]
    ]
];
