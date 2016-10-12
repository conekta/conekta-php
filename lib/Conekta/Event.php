<?php 

namespace Conekta;

use \Conekta\Resource;

class Event extends Resource
{
    public static function where($params = null)
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }

    /**
     * @deprecated
     */
    public static function all($params = null)
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }
}
