<?php

use app\core\Application;

require __DIR__.'/vendor/autoload.php';

$app = new Application();

$app->router->get('/users',function (){
    return 'user route';
});


$app->run();