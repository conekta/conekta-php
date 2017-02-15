<?php

namespace Conekta;

abstract class Conekta
{
    public static $apiKey;
    public static $apiBase = 'https://api.conekta.io';
    public static $apiVersion = '2.0.0';
    public static $locale = 'es';
    public static $plugin = '';
    const VERSION = '3.2.0';

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
    public static function setPlugin($plugin)
    {
        self::$plugin = $plugin;
    }
}
