<?php

namespace App\Router;

use App\Container;

class Router
{
    public $routes = [];
    public function __construct(private Container $app)
    {
    }
    public function get($path, $action)
    {

        [$controller, $method] = $action;
        $this->routes[$path] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function resolve()
    {
        $segments = explode("/", trim($_SERVER['REQUEST_URI'], '/'));
        $path = isset($segments[1]) ? $segments[1] : '/';

        if (!array_key_exists($path, $this->routes)) {
            echo "<h2>404 Not Found</h2>";
            return;
        }
        
        $action = $this->routes[$path];
        $controller = $this->app->get($action['controller']);
        $method = $action['method'];
        $controller->$method();
       
    }
}
