<?php

require_once "core/App.php";
require_once "core/Router.php";
require_once "core/DB.php";
require_once "core/Model.php";
require_once "app/models/Post.php";
App::bind('router', new Router);
App::bind('database', DB::connect(config('db')));
$router = App::get('router');
require_once "routes.php";

$routeData = $router->resolveUrl();
$controllerName = $routeData['controller'];
$methodName = $routeData['method'];
require_once "app/controllers/" . $controllerName . ".php";
$controller = new $controllerName;
$controller->$methodName();

