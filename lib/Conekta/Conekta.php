<?php

namespace Conekta;

abstract class Conekta
{
    /**
     * @const string
     */
    public const VERSION = '5.0.2';
    public static $apiKey = '';
    public static $apiBase = 'https://api.conekta.io';
    public static $apiVersion = '2.0.0';
    public static $locale = 'es';
    public static $plugin = '';
    public static $pluginVersion = '';

    /**
     * @param $apiBase
     * @return void
     */
    public static function setApiBase($apiBase): void
    {
        self::$apiBase = $apiBase;
    }

    /**
     * @param $apiKey
     * @return void
     */
    public static function setApiKey($apiKey): void
    {
        self::$apiKey = $apiKey;
    }

    /**
     * @param $version
     * @return void
     */
    public static function setApiVersion($version): void
    {
        self::$apiVersion = $version;
    }

    /**
     * @param $locale
     * @return void
     */
    public static function setLocale($locale): void
    {
        self::$locale = $locale;
    }

    /**
     * @return string
     */
    public static function getPlugin(): string
    {
        return self::$plugin;
    }

    /**
     * @param $plugin
     * @return void
     */
    public static function setPlugin($plugin = ''): void
    {
        self::$plugin = $plugin;
    }

    /**
     * @return string
     */
    public static function getPluginVersion(): string
    {
        return self::$pluginVersion;
    }

    /**
     * @param $pluginVersion
     * @return void
     */
    public static function setPluginVersion($pluginVersion = ''): void
    {
        self::$pluginVersion = $pluginVersion;
    }
}
