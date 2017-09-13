<?php

namespace Conekta;

use \Conekta\ConektaResource;

class Event extends ConektaResource
{
  var $data          = "";
  var $livemode      = "";
  var $webhookStatus = "";
  var $createdAt     = "";
  var $type          = "";

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
