<?php

namespace Conekta;

class Log extends ConektaResource
{
     public $method = '';
     public $url = '';
     public $status = '';
     public $version = '';
     public $ipAddress = '';
     public $related = '';
     public $requestBody = '';
     public $requestHeaders = '';
     public $createdAt = '';
     public $queryString = '';

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        }
    }

    public function __isset($property)
    {
        return isset($this->{$property});
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
