<?php

require_once "core/Router.php";
$router = new Router;
require_once "routes.php";

$routeData = $router->resolveUrl();
$controllerName = $routeData['controller'];
$methodName = $routeData['method'];
require_once "app/controllers/" . $controllerName . ".php";
$controller = new $controllerName;
$controller->$methodName();

