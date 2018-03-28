<?php

use Core\App;

App::bind('database', Core\DB::connect(config('db')));
