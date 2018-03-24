<?php

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "<pre/>";
    die;
}

function basePath()
{
    return dirname(__DIR__) . DIRECTORY_SEPARATOR;
}
