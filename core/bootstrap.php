<?php

require_once 'vendor/autoload.php';
require_once 'core/helpers.php';
require_once 'AppServiceContainer.php';

(new Router)->loadRoutes()->direct();