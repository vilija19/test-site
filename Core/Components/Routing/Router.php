<?php
/**
 * роутер
 * 
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components\Routing;

/**
 * Class Router
 */
class Router implements \Vilija19\Core\Interfaces\RouteInterface
{
    /**
     * Property stores the array of routes
     * This array stores the correspondence of the route to the callable objects (for example, controllers)
     * examples:
     *  '/home/index' => [ \Vilija19\App\Controllers\HomeController::class , 'index'],
     *  '/product/show'=> function () { echo('Run callback'); }
     * @var array
     * @access protected
     */
    protected $routes;
    /**
     * Property stores the object
     * Here we store the instance of the controller that will process the route
     * @var Object
     * @access protected
     */
    protected $controller;
    /**
     * Property stores the string value
     * Here we store the name of the controller method that will process the route
     * @var string
     * @access protected
     */    
    protected $method;
    /**
     * Property stores the called object
     * @var callable
     * @access protected
     */
    protected $outObj;
    /**
     * Property stores the string with parameters for the called method
     * @var string
     * @access protected
     */
    protected $parameters = '';
    /**
     * Property stores the array of errors
     * @var array 
     * @access protected
     */
    protected $errors;


    public function __construct(array $arguments = [])
    {
        $this->routes = $arguments['routes'] ?? [];
        /**
         * Route notfound is needed for the operation of this router.
         * If it is not - add it.
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
     * This method implements the RouteInterface interface
     * @param string $uri  - route.
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
     * this method allows you to add route handlers
     * @var string $path - route.
     * @var callable $action - обработчик
     */
    public function addRoute(string $path, $action)
    {
        if ($path && $action) {
            $this->routes[$path] = $action;
        }
    }

}