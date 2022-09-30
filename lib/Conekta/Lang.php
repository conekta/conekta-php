<?php

namespace Conekta;

class Lang
{
    /**
     * @const string
     */
    public const EN = 'en';
    /**
     * @const string
     */
    public const ES = 'es';

    /**
     * @var array
     */
    protected static array $cache = [];

    /**
     * @param $key
     * @param $locale
     * @param array $parameters
     * @return array|mixed|string|string[]
     */
    public static function translate($key, $locale, array $parameters = []): mixed
    {
        $parameters = str_replace('Conekta\\', '', $parameters);

        $langs = self::readDirectory(dirname(__FILE__) . '/../locales/messages');

        $keys = explode('.', $locale . '.' . $key);
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

    /**
     * @param $directory
     * @return array
     */
    protected static function readDirectory($directory): array
    {
        if (!empty(self::$cache)) {
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
