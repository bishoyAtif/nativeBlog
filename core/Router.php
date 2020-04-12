<?php

namespace Core;

use Exception;

class Router
{
    private $routes = ['GET' => [], 'POST' => []];

    public function loadRoutes()
    {
        require_once "routes.php";
        return $this;
    }

    public function direct()
    {
        $routeData = $this->resolveUrl();
        $this->callAction(...$routeData);
    }

    private function callAction($controller, $method)
    {
        $fullControllerPath = "\\App\\Controllers\\" . $controller;
        (new $fullControllerPath)->$method(Request::get('id'));
    }

    public function get($uri, $action)
    {
        $uriRegex = $this->uriRegex($uri);
        $this->routes['GET'][$uriRegex] = $action;
    }

    public function post($uri, $action)
    {
        $uriRegex = $this->uriRegex($uri);
        $this->routes['POST'][$uriRegex] = $action;
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
                return explode('@', $action);
            }
        }

        throw new Exception("Error 404");
    }

    // Getting the URI ready to be Regex-ed
    private function uriRegex($uri = "")
    {
        $uri = "/^" . str_replace('/', '\/', $uri) . "(\?.+)?$/";
        return str_replace('*', '([1-9]+)', $uri);
    }
}
