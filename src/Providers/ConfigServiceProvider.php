<?php

namespace App\Providers;

use Silex\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class ConfigServiceProvider implements ServiceProviderInterface
{

    public function boot(Application $app)
    {

    }

    public function register(Container $app)
    {
        $this->loadConfig($app);
    }

    private function loadConfig(Container $app)
    {

        $appConfig = $this->parseConfig('app');
        // Some config more

        $config = array_merge($appConfig);

        foreach ($config as $key => $value) {
            $app[$key] = function(Container $app) use ($value) {
                return $value;
            };
        }
    }

    private function parseConfig(string $fileName)
    {
        $config = [];

        try {
            $config = Yaml::parse(file_get_contents(__DIR__ . '/../../app/config/' . $fileName . '.yml'));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }

        return $config[$fileName];
    }
}
