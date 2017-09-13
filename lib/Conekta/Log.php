<?php

namespace Conekta;

use \Conekta\ConektaResource;

class Log extends ConektaResource
{
  var $method         = "";
  var $url            = "";
  var $status         = "";
  var $version        = "";
  var $ipAddress      = "";
  var $related        = "";
  var $requestBody    = "";
  var $requestHeaders = "";
  var $createdAt      = "";
  var $queryString    = "";

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
