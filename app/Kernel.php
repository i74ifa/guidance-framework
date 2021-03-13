<?php



return [

    /**
     * definition your middleware
     */
    'Middleware' => [
        'auth' => \App\Middleware\Authentication::class,
        'app' => \App\Middleware\Application::class,
    ],
    

];