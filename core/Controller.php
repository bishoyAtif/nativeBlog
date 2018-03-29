<?php

namespace Core;

class Controller
{
    public function render($view, $parameters = [])
    {
        extract($parameters);
        $viewPath = "app/views/" . implode(DIRECTORY_SEPARATOR, explode('.', $view)) . ".view.php";

        require $viewPath;
    }
}