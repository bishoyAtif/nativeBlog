<?php

class Request
{
    public static function all()
    {
        return $_REQUEST;
    }

    public static function get($key = null)
    {
        if (!array_key_exists($key, $_REQUEST)) {
            return null;
        }

        return $_REQUEST[$key];
    }

    public static function only($keys = [])
    {
        return array_filter($_REQUEST,
            function($key) use($keys){
                return in_array($key, $keys);
            },
            ARRAY_FILTER_USE_KEY
        );
    }

}