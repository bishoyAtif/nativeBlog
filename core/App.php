<?php

class App
{
    protected static $registery = [];

    public static function bind($key, $value)
    {
        self::$registery[$key] = $value;
    }

    public static function get($key = null)
    {
        if (!array_key_exists($key, self::$registery)) {
            throw new Exception("No {$key} is registed");
        }

        return self::$registery[$key];
    }
}
