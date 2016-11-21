<?php

namespace App\Providers;

use Silex\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class RouteServiceProvider implements ServiceProviderInterface
{

    public function boot(Application $app)
    {

    }

    public function register(Container $app)
    {
        $this->loadRoutes($app);
    }

    private function loadRoutes(Container $app)
    {

        $routes = $this->parseRoutes();

        foreach ($routes as $route) {
            $path = $route['path'];
            $method = strtolower($route['method']);
            $controller = explode('@', $route['controller']);
            $classController = $controller[0];
            $actionController = $controller[1];

            if (!array_key_exists($classController, $app)) {
                $app[$classController] = function($app) use ($classController) {
                   return new $classController();
                };
            }

            $app->$method($path, $classController . ':' . $actionController);
        }
    }

    private function parseRoutes()
    {
        $routes = [];

        try {
            $routes = Yaml::parse(file_get_contents(__DIR__ . '/../../app/routes/routes.yml'));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }

        return $routes;
    }
}
