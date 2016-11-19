<?php

namespace App\Providers;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class ConfigServiceProvider
{

    public static function load(\Silex\Application $app) : \Silex\Application
    {

        $appConfig = self::loadConfig('app');

        $configLoaded = array_merge($appConfig);
        foreach ($configLoaded as $key => $value) {
            $app[$key] = $value;
        }

        return $app;
    }

    private static function loadConfig(string $fileName)
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
