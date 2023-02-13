<?php

namespace Vilija19\Core;

use Vilija19\Core\Exceptions\GetComponentException;
use Vilija19\Core\Interfaces\RunnableInterface;

class Application implements RunnableInterface
{
    protected $config;

    protected static $instance;

    public static function getApp(array $config = [])
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    private function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getComponent($key)
    {

        $class = $this->config['components'][$key]['class'];
        if (class_exists($class)) {
            $arguments = $this->config['components'][$key]['arguments'] ?? [];
            $instance = new $class($arguments);
            return $instance;
        }

        throw new GetComponentException('Component not found');
    }

    public function run()
    {
        $router = $this->getComponent('router');
        $action = $router->route($_SERVER['REQUEST_URI']);

        return $action();
    }
}