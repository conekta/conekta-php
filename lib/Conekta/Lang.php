<?php

namespace Conekta;

class Lang
{
  const EN = 'en';
  const ES = 'es';

  protected static $cache = array();

  public static function translate($key, $locale, $parameters = null)
  {
    $parameters = str_replace("Conekta\\", "", $parameters);

    $langs = self::readDirectory(dirname(__FILE__) . '/../locales/messages');

    $keys = explode('.', $locale.'.'.$key);
    $result = $langs[array_shift($keys)];

    foreach ($keys as $val) {
      $result = $result[$val];
    }

    if (is_array($parameters) && !empty($parameters)) {
      foreach ($parameters as $object => $val) {
        $result = str_replace($object, $val, $result);
      }
    }

    return $result;
  }

  protected static function readDirectory($directory)
  {
    if (!empty(self::$cache)) {
      return self::$cache;
    }

    $langs = array();
    if ($handle = opendir($directory)) {
      while ($lang = readdir($handle)) {
        if (strpos($lang, '.php') !== false) {
          $langKey = str_replace('.php', '', $lang);
          $langs[$langKey] = include $directory.'/'.$lang;
        }
      }

      closedir($handle);
    }

    self::$cache = $langs;

    return $langs;
  }
}
