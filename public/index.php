<?php

use app\controllers\ContactController;
use app\controllers\UserController;
use app\controllers\HomeController;
use app\controllers\AuthController;
use app\core\Application;

require __DIR__ . '/../vendor/autoload.php';
$rootPath = dirname(__DIR__);

$app = new Application($rootPath);


$app->router->get('/',[HomeController::class,'index']);

$app->router->get('/contact',[ContactController::class,'create']);
$app->router->post('/contact/create',[ContactController::class,'store']);

$app->router->get('/users',[UserController::class,'index']);
$app->router->get('/user/create',[UserController::class,'create']);

$app->router->get('/login',[AuthController::class,'index']);
$app->router->post('/login',[AuthController::class,'index']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);



$app->run();
