<?php

require_once 'vendor/autoload.php';

App::bind('router', new Router);
App::bind('database', DB::connect(config('db')));
$router = App::get('router');
require_once "routes.php";

$routeData = $router->resolveUrl();
$controllerName = $routeData['controller'];
$methodName = $routeData['method'];
$controller = new $controllerName;
$controller->$methodName(Request::get('id'));

