<?php
class LANG
{ 
	const EN = 'en';
	const ES = 'es';

	protected static $cache = array();

	public static function translate($key, $parameters=null, $locale)
	{
		$langs = self::readDirectory(dirname(__FILE__) . '/messages');

		$keys = explode(".", $locale . '.' .$key);
		$result = $langs[array_shift($keys)];
		foreach ($keys as $v) {
			$result = $result[$v];
		}
		if (is_array($parameters) && !empty($parameters)) {
			foreach($parameters as $k => $v) {
				$result = str_replace($k,$v,$result);
			}
		}

		return $result;
	}

	protected static function readDirectory($directory)
	{
		if (!empty(self::$cache)) return self::$cache;

		$langs = array();
		if ($handle = opendir($directory)) {
			while ($lang = readdir($handle)) {
				if (strpos($lang, ".php") !== false) {
					$langKey = str_replace('.php', '', $lang);
					$langs[$langKey] = include($directory . '/' . $lang);
				}
			}
			closedir($handle);
		}

		self::$cache = $langs;

		return $langs;
	}
	
}
?>
