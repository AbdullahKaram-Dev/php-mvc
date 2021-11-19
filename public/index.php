<?php

use app\core\Application;

require __DIR__ . '/../vendor/autoload.php';
$rootPath = dirname(__DIR__);

$app = new Application($rootPath);

$app->router->get('/','home');
$app->router->get('/users','users');


$app->run();