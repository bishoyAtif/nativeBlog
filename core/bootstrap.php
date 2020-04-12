<?php

require_once 'vendor/autoload.php';
require_once 'core/helpers.php';
require_once 'AppServiceContainer.php';

if (php_sapi_name() !== 'cli') {
    (new Core\Router)->loadRoutes()->direct();
}
