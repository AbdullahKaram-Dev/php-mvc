<?php

use app\core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/users','users');



try {
    $app->run();
}catch (\Exception $exception){
    echo $exception->getMessage();
}
