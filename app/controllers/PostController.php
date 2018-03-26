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

    public function show($id)
    {
        $post = $this->posts->find($id);
        if (!$post) {
            throw new Exception("Error 404");
        }

        require_once 'app/views/posts/show.view.php';
    }

    public function create()
    {
        require_once "app/views/posts/create.view.php";
    }

    public function store()
    {
        $this->posts->create(Request::only(['title', 'content']));
        header('Location: '. route('posts'));
        exit;
    }

    public function edit($id)
    {
        $post = $this->posts->find($id);

        if (!$post) {
            throw new Exception("Error 404");
        }

        require_once "app/views/posts/edit.view.php";
    }

    public function update()
    {
        $this->posts->update(Request::only(['id', 'title', 'content']));
        header('Location: '. route('posts'));
        exit;
    }
}