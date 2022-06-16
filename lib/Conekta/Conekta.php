<?php

namespace Conekta;

abstract class Conekta
{
    public static string $apiKey = '';
    public static string $apiBase = 'https://api.conekta.io';
    public static string $apiVersion = '2.0.0';
    public static string $locale = 'es';
    public static string $plugin = '';
    public static string $pluginVersion = '';
    public const VERSION = '5.0.0';

    public static function setApiBase($apiBase)
    {
        self::$apiBase = $apiBase;
    }

    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    public static function setApiVersion($version)
    {
        self::$apiVersion = $version;
    }

    public static function setLocale($locale)
    {
        self::$locale = $locale;
    }

    public static function setPlugin($plugin = '')
    {
        self::$plugin = $plugin;
    }

    public static function setPluginVersion($pluginVersion = '')
    {
        self::$pluginVersion = $pluginVersion;
    }

    public static function getPlugin()
    {
        return self::$plugin;
    }

    public static function getPluginVersion()
    {
        return self::$pluginVersion;
    }
}
