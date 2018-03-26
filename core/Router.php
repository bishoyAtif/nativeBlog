<?php

class Router
{
    private $routes = ['GET' => [], 'POST' => []];

    public function get($uri, $controllerName)
    {
        $uriRegex = $this->uriRegex($uri);
        $this->routes['GET'][$uriRegex] = $this->resolveControllerName($controllerName);
    }

    public function post($uri, $controllerName)
    {
        $uriRegex = $this->uriRegex($uri);
        $this->routes['POST'][$uri] = $this->resolveControllerName($controllerName);
    }

    public function resolveUrl()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$requestMethod] as $uri => $action) {
            preg_match($uri, $requestUri, $matches);
            if (!empty($matches)) {
                if (array_key_exists(1, $matches)) {
                    $_REQUEST['id'] = $matches[1];
                }
                return $action;
            }
        }

        throw new Exception("Error 404");
    }

    protected function resolveControllerName($routeToController)
    {
        $resolvedName = explode('@', $routeToController);
        return ['controller' => $resolvedName[0], 'method' => $resolvedName[1]];
    }

    // Getting the URI ready to be Regex-ed
    private function uriRegex($uri = "")
    {
        $uri = "/^" . str_replace('/', '\/', $uri) . "$/";
        return str_replace('*', '([1-9]+)', $uri);
    }
}