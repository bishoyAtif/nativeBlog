<?php

Router::get('/', 'HomeController@index');

Router::get('/posts', 'PostController@index');
Router::get('/posts/create', 'PostController@create');
Router::post('/posts', 'PostController@store');
Router::get('/posts/*', 'PostController@show');
Router::get('/posts/*/edit', 'PostController@edit');
Router::post('/posts/*', 'PostController@update');
