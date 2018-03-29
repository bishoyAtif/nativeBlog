<?php

namespace App\Controllers;

use App\Models\Post;
use Core\{Request, Controller};

class PostController extends Controller
{
    public function __construct()
    {
        $this->posts = new Post;
    }

    public function index()
    {
        $posts = $this->posts->all();
        
        $this->render("posts.index", compact("posts"));
    }

    public function show($id)
    {
        $post = $this->posts->find($id);
        if (!$post) {
            throw new Exception("Error 404");
        }

        $this->render("posts.show", compact("post"));
    }

    public function create()
    {
        $this->render("posts.create");
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

        $this->render("posts.edit", compact("post"));
    }

    public function update()
    {
        $this->posts->update(Request::only(['id', 'title', 'content']));
        
        header('Location: '. route('posts'));
        exit;
    }
}