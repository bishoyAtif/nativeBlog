<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        require_once "app/views/home.view.php";
    }
}