<?php

namespace Conekta;

abstract class Conekta
{
    public static $apiKey;
    public static $apiBase = 'https://api.conekta.io';
    public static $apiVersion = '2.0.0';
    public static $locale = 'es';
    public static $plugin = '';
    public static $pluginVersion = '';
    const VERSION = '4.0.4';

    
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
