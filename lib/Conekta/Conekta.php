<?php
abstract class Conekta
{
	public static $apiKey;
	public static $apiBase = 'https://api.conekta.io';
	public static $apiVersion = '0.3.0';
	const VERSION = '1.9.0';
	
	public static function setApiKey($apiKey)
	{
		self::$apiKey = $apiKey;
	}
}
?>
