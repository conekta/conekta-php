<?php 

namespace Conekta;

use \Conekta\Resource;

class Event extends Resource
{
    var $data           = "";
    var $livemode       = "";
    var $webhook_status = "";
    var $created_at     = "";
    var $type           = ""; 

    public function __get($property)
    {   
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function  __isset($property)
    {
        return isset($this->$property);
    }

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
