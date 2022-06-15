<?php

namespace Conekta;

class Event extends ConektaResource
{
    public string $data = '';
    public string $livemode = '';
    public string $webhookStatus = '';
    public string $createdAt = '';
    public string $type = '';

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
