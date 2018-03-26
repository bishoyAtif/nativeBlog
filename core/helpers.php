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

function config($key = null)
{
    $requiredConfig = require basePath() . 'config.php';
    $separatedKeys = explode('.', $key);

    foreach ($separatedKeys as $singleKey) {
        if (!isset($requiredConfig[$singleKey])) {
            return null;
        }

        $requiredConfig = $requiredConfig[$singleKey];
    }

    return $requiredConfig;
}

function asset($relativePath = "")
{
    return 'http://' . $_SERVER['HTTP_HOST'] . '/' . $relativePath;
}