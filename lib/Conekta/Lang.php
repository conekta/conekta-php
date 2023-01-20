<?php

namespace Conekta;

class Lang
{
    public const EN = 'en';
    public const ES = 'es';

    protected static array $cache = [];

    public static function translate($key, $locale, $parameters = [])
    {
        $parameters = str_replace('Conekta\\', '', $parameters);

        $langs = self::readDirectory(dirname(__FILE__) . '/../locales/messages');

        $keys = explode('.', $locale . '.' . $key);
        $result = $langs[array_shift($keys)];

        foreach ($keys as $val) {
            $result = $result[$val];
        }

        if (is_array($parameters) && ! empty($parameters)) {
            foreach ($parameters as $object => $val) {
                $result = str_replace($object, $val, $result);
            }
        }

        return $result;
    }

    protected static function readDirectory($directory)
    {
        if (! empty(self::$cache)) {
            return self::$cache;
        }

        $langs = [];
        if ($handle = opendir($directory)) {
            while ($lang = readdir($handle)) {
                if (strpos($lang, '.php') !== false) {
                    $langKey = str_replace('.php', '', $lang);
                    $langs[$langKey] = include $directory . '/' . $lang;
                }
            }

            closedir($handle);
        }

        self::$cache = $langs;

        return $langs;
    }
}
