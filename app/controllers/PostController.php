<?php

namespace App\Controllers;

use Core\App;
use Exception;
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
        $em = App::get('EntityManager');
        $postRepository = $em->getRepository(Post::class);

        $posts = $postRepository->findAll();

        $this->render("posts.index", compact("posts"));
    }

    public function show($id)
    {
        $em = App::get('EntityManager');
        $postRepository = $em->getRepository(Post::class);

        $post = $postRepository->find($id);

        // $post = $this->posts->find($id);
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
        $em = App::get('EntityManager');
        $post = new Post();
        $post->setTitle(Request::get('title'));
        $post->setContent(Request::get('content'));
        $em->persist($post);
        $em->flush();
        // $this->posts->create(Request::only(['title', 'content']));

        header('Location: ' . route('posts'));
        exit;
    }

    public function edit($id)
    {
        $em = App::get('EntityManager');
        $postRepository = $em->getRepository(Post::class);

        $post = $postRepository->find($id);

        if (!$post) {
            throw new Exception("Error 404");
        }

        $this->render("posts.edit", compact('post'));
    }

    public function update($id)
    {
        $em = App::get('EntityManager');
        $postRepository = $em->getRepository(Post::class);

        $post = $postRepository->find($id);

        $post->setContent(Request::get('content'));
        $post->setTitle(Request::get('title'));

        $em->persist($post);
        $em->flush();

        header('Location: ' . route('posts'));
        exit;
    }
}
