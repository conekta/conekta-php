<?php

class Conekta_Log extends Conekta_Resource
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