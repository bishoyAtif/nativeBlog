<?php

class HomeController
{
    public function index()
    {
        require_once "app/views/home.view.php";
    }

    public function create()
    {
        require_once "app/views/posts/create.view.php";
    }
}