<?php

namespace Core;

use PDO;

class DB
{
    public static function connect($dbConfig)
    {
        try {
            return new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['name']}", $dbConfig['user'], $dbConfig['password']);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}