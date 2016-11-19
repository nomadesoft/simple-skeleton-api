<?php

require_once __DIR__ . '/../../vendor/autoload.php';


$app = new Silex\Application();
// Load Config
$app = App\Providers\ConfigServiceProvider::load($app);

// Register Providers
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// Load controllers
$app->get('/', function(){
    return "Hello!!";
});

return $app;
