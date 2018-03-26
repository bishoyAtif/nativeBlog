<?php

class PostController
{
    public function __construct()
    {
        $this->posts = new Post;
    }

    public function index()
    {
        $posts = $this->posts->all();
        
        require_once "app/views/posts/index.view.php";
    }

    public function create()
    {
        require_once "app/views/posts/create.view.php";
    }

    public function store()
    {
        $this->posts->create(Request::only(['title', 'content']));
        header('Location: http://localhost:8000/posts');
        exit;
    }
}