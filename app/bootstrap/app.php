<?php

require_once __DIR__ . '/../../vendor/autoload.php';


$app = new Silex\Application();

// Register and load ConfigServiceProvider
$app->register(new App\Providers\ConfigServiceProvider());

// Register and load Routes
$app->register(new App\Providers\RouteServiceProvider());

// Register Providers
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// App error handling
$app->error(function(\Exception $e, \Symfony\Component\HttpFoundation\Request $request, $code) {
    if ($app['debug']) {
        return $app->json([
            'status' => $code,
            'errors' => $e->getMessage(),
        ], $code);
    }
});

return $app;
