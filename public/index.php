<?php

use app\core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->router->get('/users',function (){
    echo 'user route';
});



try {
    $app->run();
}catch (\Exception $exception){
    echo $exception->getMessage();
}
