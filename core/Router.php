<?php

namespace App\Core;

use \Exception;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    protected $notFoundCallback;

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function set404($fn)
    {
        $this->notFoundCallback = $fn;
    }

    public function get($pattern, $fn)
    {
        $this->routes['GET'][] = [
            'pattern' => $pattern,
            'fn' => $fn,
        ];
    }

    public function direct($uri, $requestType)
    {
        foreach($this->routes[$requestType] as $route)
        {
            if(preg_match($route['pattern'], $uri, $matches))
            {
                return $this->callAction(
                    ...explode('@', $route['fn']($uri))
                );
            }
        }
        // fix Exception, route doesn't exist
        //throw new Exception('No route defined for this URI.');

        call_user_func($this->notFoundCallback);
    }

    protected function callAction($controller, $action, $uri = null)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            // error -> method doesn't respond/exist
            // echo "{$controller} does not respond to the {$action} action.";
            call_user_func($this->notFoundCallback);
        }

        return $controller->$action($uri);
    }
}