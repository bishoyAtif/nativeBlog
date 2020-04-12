<?php

use Core\App;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

App::bind('database', Core\DB::connect(config('db')));

$paths = [__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR];
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'secret',
    'dbname'   => 'native_blog',
);
$entityManager = EntityManager::create($dbParams, $config);

App::bind('EntityManager', $entityManager);
