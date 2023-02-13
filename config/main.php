<?php

return [
    'app_name' => 'Test framework',
    'components' => [
        'responce' => [
            'class' => \Vilija19\Core\Components\Responce::class             
        ],
        'router' => [
            'class' => \Vilija19\Core\Components\Routing\Router::class,
            'arguments' => [
                'routes' => array(
                    '/' => [ \Vilija19\App\Controllers\HomeController::class , 'index'],
                    '/add-product' => [ \Vilija19\App\Controllers\ProductController::class , 'view']
                )
            ]            
        ]               
    ]
];