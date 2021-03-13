<?php



return [


    'name' => 'MVC Tutorial',
    'timezone' => 'asia/aden',
    'locale' => 'ar',
    'classes' => [
        'home' => '\App\Controllers\Home::class',
        'good' => '\App\Controllers\Good::class'
    ],
    'errors_file' => getcwd() . '/../error.json', 

];