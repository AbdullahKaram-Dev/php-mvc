<?php

use app\controllers\UserController;
use app\controllers\HomeController;
use app\core\Application;

require __DIR__ . '/../vendor/autoload.php';
$rootPath = dirname(__DIR__);

$app = new Application($rootPath);

$app->router->get('/',[HomeController::class,'index']);

$app->router->get('/users',[UserController::class,'index']);
$app->router->get('/user/create',[UserController::class,'create']);



$app->run();