<?php

require_once 'vendor/autoload.php';

App::bind('database', DB::connect(config('db')));
(new Router)->loadRoutes()->direct();