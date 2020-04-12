<?php

use Core\App;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'core/bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = App::get('EntityManager');

return ConsoleRunner::createHelperSet($entityManager);
