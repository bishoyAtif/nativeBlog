<?php

$router->get('/', 'HomeController@index');
$router->get('/posts', 'PostController@index');
$router->get('/posts/create', 'PostController@create');
