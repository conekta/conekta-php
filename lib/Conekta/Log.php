<?php 

namespace Conekta;

use \Conekta\Resource;

class Log extends Resource
{
    var $method          = "";
    var $url             = "";
    var $status          = "";
    var $version         = "";
    var $ip_address      = "";
    var $related         = "";
    var $request_body    = "";
    var $request_headers = "";
    var $created_at      = "";
    var $query_string    = "";

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
    
    public static function find($id)
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }

    public static function where($params = null)
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }
}
