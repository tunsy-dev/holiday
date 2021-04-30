<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enums
    |--------------------------------------------------------------------------
    |
    | This is how we do constants and enums - use this key value array to define stuff
    |
    */

    'authority_level' => [
        0 => 'Employee',
        1 =>  'Fishcake',
        2 => 'Manager',
        3 => 'Admin'
    ],

    'status' => [
        0 => 'Requested',
        1 => 'Request change',
        2 => 'Request cancellation',
        3 => 'Declined',
        4 => 'Accepted',
        5 => 'Cancelled'
    ]

];
