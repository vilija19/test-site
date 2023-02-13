<?php

return [
    'app_name' => 'Test framework',
    'components' => [
        'responce' => [
            'factory' => \Vilija19\Core\Components\ResponceFactory::class             
        ],
        'router' => [
            'factory' => \Vilija19\Core\Components\Routing\RouterFactory::class,
            'arguments' => [
                'routes' => array(
                    '/' => [ \Vilija19\App\Controllers\HomeController::class , 'index'],
                    '/add-product' => [ \Vilija19\App\Controllers\ProductController::class , 'view']
                )
            ]            
        ],
        'storage' => [
            'factory' => \Vilija19\Core\Components\DataBaseFactory::class,
            'arguments' => [
                'host' => 'database',
                'dbname' => 'test-site',
                'user' => 'test-site',
                'password' => 'test-site'
            ]            
        ]                
    ]
];