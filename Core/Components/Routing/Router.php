<?php
/**
 * роутер
 * 
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components\Routing;

/**
 * Класс  Router
 */
class Router implements \Vilija19\Core\Interfaces\RouteInterface
{
    /**
     * Свойство хранящее значение типа array.
     * Этот массив хранит соответствие роута вызываемым обьектам (например контроллерам)
     * examples:
     *  '/home/index' => [ \Vilija19\App\Controllers\HomeController::class , 'index'],
     *  '/product/show'=> function () { echo('Run callback'); }
     * @var array
     * @access protected
     */
    protected $routes;
    /**
     * Свойство хранящее значение типа обьект
     * Здесь храним эксемпляр контроллера, который будет обрабатывать роут
     * @var Object
     * @access protected
     */
    protected $controller;
    /**
     * Свойство хранящее значение типа строка
     * Здесь храним название метода контроллера, который будет обрабатывать роут
     * @var string
     * @access protected
     */    
    protected $method;
    /**
     * Свойство хранящее вызываемый объект.
     * @var callable
     * @access protected
     */
    protected $outObj;
    /**
     * Свойство хранящее строку с параметрами для вызываемого метода.
     * @var string
     * @access protected
     */
    protected $parameters = '';
    /**
     * Свойство хранит массив ошибок
     * @var array 
     * @access protected
     */
    protected $errors;


    public function __construct(array $arguments = [])
    {
        $this->routes = $arguments['routes'] ?? [];
        /**
         * Роут notfound нужен для работы данного роутера.
         * Если его нет - добавляем.
         */
        if (!isset($routes['/notfound'])) {
            $this->addRoute('/notfound', function ($messages=[]) { echo('Page not found <br>');
                foreach ($messages as $message) {
                    echo($message . '<br>');
                }
            });
        }
    }

    /**
     * Этот метод реализовывает интерфейс RouteInterface из пакета Vilija19\Core 
     * @param string $uri  - роут.
     * @return callable 
     */    
    public function route(string $uri): callable
    {

        $routeData = explode('?',$uri); // $uri - "/product/view?anything=test&id=123"
        $route = $routeData[0];        

        if (isset($this->routes[$route]) && is_array($this->routes[$route])) {

            $actionInfo = $this->routes[$route];

            if (class_exists($actionInfo[0])) {
                $this->controller = new $actionInfo[0];
            }else{
                $this->errors[] = "Error. Router class not found";
            }  

            if (method_exists($this->controller, $actionInfo[1])) {
                $this->method = $actionInfo[1];
            }else{
                $this->errors[] = "Error. Route not found";
            }
            if ($this->errors) {
                $this->outObj = $this->routes['/notfound'];
            }else{
                $this->outObj = [$this->controller, $this->method];
            }

        }elseif (isset($this->routes[$route]) && is_callable($this->routes[$route])) {

            $this->outObj = $this->routes[$route];

        }else{
            
            $this->errors[] = "Error. Route not found";
            $this->outObj = $this->routes['/notfound'];
        }

        return function () { 
            if ($this->errors) {
                return call_user_func($this->outObj,$this->errors);
            }elseif ($this->parameters) {
                return call_user_func($this->outObj,$this->parameters);
            }else {
                return call_user_func($this->outObj);
            }
        };

    }

    /**
     * Этот метод дает возможность добавлять обработчики роутов
     * @var string $path - роут.
     * @var callable $action - обработчик
     */
    public function addRoute(string $path, $action)
    {
        if ($path && $action) {
            $this->routes[$path] = $action;
        }
    }

}