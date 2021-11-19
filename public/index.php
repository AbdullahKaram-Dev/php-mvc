<?php

use app\core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/','home');
$app->router->get('/users','users');



$app->run();