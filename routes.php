<?php

$router->get('/', 'HomeController@index');
$router->get('/posts', 'PostController@index');
$router->post('/posts', 'PostController@store');
$router->get('/posts/create', 'PostController@create');
