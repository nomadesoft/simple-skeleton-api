<?php

namespace App\Providers;

use Silex\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class ConfigServiceProvider implements ServiceProviderInterface
{
    private $prefix;

    public function __construct(string $prefix = 'config')
    {
        $this->prefix = $prefix;
    }

    public function boot(Application $app)
    {

    }

    public function register(Container $app)
    {
        $this->loadConfig($app);
    }

    private function loadConfig(Container $app)
    {

        $configLoaded = [];

        $files = glob(__DIR__ . '/../../app/config/*.{yml}', GLOB_BRACE);

        foreach ($files as $file) {
            $config = $this->parseConfig($file);

            foreach ($config as $key => $value) {
                $configLoaded[$key] = $value;
            }
        }

        $app[$this->prefix] = function ($app) use ($configLoaded) {
            return $configLoaded;
        };
    }

    private function parseConfig(string $filePath) : array
    {
        $config = [];

        try {
            $config = Yaml::parse(file_get_contents($filePath));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }

        return $config;
    }
}
