<?php
abstract class Conekta
{
	public static $apiKey;
	public static $apiBase = 'https://api.conekta.io';
	public static $apiVersion = '1.0.0';
	public static $locale = 'es';
	const VERSION = '1.9.9';
	
	public static function setApiKey($apiKey)
	{
		self::$apiKey = $apiKey;
	}
	
	public static function setApiVersion($version)
	{
		self::$apiVersion = $version;
	}

	public static function setLocale($locale) {
		self::$locale = $locale;
	}
}
?>
