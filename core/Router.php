<?php

class Router
{
    private $routes = ['GET' => [], 'POST' => []];

    public function get($uri, $controllerName)
    {
        $this->routes['GET'][$uri] = $this->resolveControllerName($controllerName);
    }

    public function post($uri, $controllerName)
    {
        $this->routes['POST'][$uri] = $this->resolveControllerName($controllerName);
    }

    public function resolveUrl()
    {
        if (array_key_exists($_SERVER['REQUEST_URI'], $this->routes[$_SERVER['REQUEST_METHOD']])) {
            return $this->routes[$_SERVER['REQUEST_METHOD']][$_SERVER['REQUEST_URI']];
        } else {
            throw new Exception("Error 404");
        }
    }

    protected function resolveControllerName($routeToController)
    {
        $resolvedName = explode('@', $routeToController);
        return ['controller' => $resolvedName[0], 'method' => $resolvedName[1]];
    }
}