<?php namespace Conekta;

class Log extends Resource
{
    public static function find($id)
    {
        $class = get_called_class();

        return self::_scpFind($class, $id);
    }

    public static function where($params = null)
    {
        $class = get_called_class();

        return self::_scpWhere($class, $params);
    }
}