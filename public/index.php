<?php

ini_set('display_errors', '1');

// Added autoloader
function autoload($className) 
{
    $nameSpace = 'Vilija19';  
    $path = str_replace('\\','/',$className);
    $path = str_replace($nameSpace . '/','',$path);
	$filename = __DIR__  . '/../' . $path . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
}

spl_autoload_register('autoload');
// Added autoloader

$config = include __DIR__ . '/../config/main.php';

$app = Vilija19\Core\Application::getApp($config);
$app->run();

