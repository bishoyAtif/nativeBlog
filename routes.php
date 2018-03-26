<?php

$router->get('/', 'HomeController@index');

$router->get('/posts', 'PostController@index');
$router->get('/posts/create', 'PostController@create');
$router->post('/posts', 'PostController@store');
$router->get('/posts/*/edit', 'PostController@edit');
$router->post('/posts/*', 'PostController@update');
