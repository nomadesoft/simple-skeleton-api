<?php

require_once __DIR__ . '/../../vendor/autoload.php';


$app = new Silex\Application();

// Register and load ConfigServiceProvider
$app->register(new App\Providers\ConfigServiceProvider());

// Register and load Routes
$app->register(new App\Providers\RouteServiceProvider());

// Register Providers
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// Load controllers
$app->get('/', function(){
    return "Hello!!";
});

return $app;
