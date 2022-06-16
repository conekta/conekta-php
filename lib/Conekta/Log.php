<?php

namespace Conekta;

class Log extends ConektaResource
{
    public string $method;
    public string $url;
    public string $status;
    public string $version;
    public string $ipAddress;
    public string $related;
    public string $requestBody;
    public string $requestHeaders;
    public string $createdAt;
    public string $queryString;

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
