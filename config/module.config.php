<?php

return [
    'validators' => [
        'invokables' => [
            'HtDayModule\Validator\Day' => 'HtDayModule\Validator\Day',
        ],
        'aliases' => [
            'HtDay' => 'HtDayModule\Validator\Day',
            'Day' => 'HtDayModule\Validator\Day',
        ]
    ]
];
