<?php

return [
    'app_name' => 'Test framework',
    'components' => [
        'responce' => [
            'factory' => \Vilija19\Core\Components\Responce\ResponceFactory::class             
        ],
        'orm' => [
            'factory' => \Vilija19\Core\Components\Orm\SimpleOrmFactory::class            
        ],
        'template' => [
            'factory' => \Vilija19\Core\Components\Template\TemplateFactory::class            
        ],        
        'router' => [
            'factory' => \Vilija19\Core\Components\Routing\RouterFactory::class,
            'arguments' => [
                'routes' => array(
                    '/' => [ \Vilija19\App\Controllers\HomeController::class , 'index'],
                    '/delete' => [ \Vilija19\App\Controllers\HomeController::class , 'delete'],
                    '/add-product' => [ \Vilija19\App\Controllers\ProductController::class , 'create'],
                    '/add-product/store' => [ \Vilija19\App\Controllers\ProductController::class , 'store'],
                )
            ]            
        ],
        'storage' => [
            'factory' => \Vilija19\Core\Components\Storage\DataBaseFactory::class,
            'arguments' => [
                'host' => 'database',
                'dbname' => 'test-site',
                'user' => 'test-site',
                'password' => 'test-site'
            ]            
        ]                
    ]
];