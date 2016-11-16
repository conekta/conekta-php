<?php 

namespace Conekta;

use \Conekta\Resource;

class Token extends Resource
{
    public static function find($id)
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }

    public static function create($params = null)
    {
        $class = get_called_class();
        
        return parent::_scpCreate($class, $params);
    }

    /**
     * @deprecated
     */
    public static function retrieve($id)
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }
}
