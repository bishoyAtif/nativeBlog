<?php

class PostController
{
    public function index()
    {
        require_once "app/views/posts/index.view.php";
    }

    public function create()
    {
        require_once "app/views/posts/create.view.php";
    }
}