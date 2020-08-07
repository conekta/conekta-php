<?php

namespace Conekta;

use \Conekta\ConektaResource;

class Checkout extends ConektaResource
{

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

  public function loadFromArray($values = null)
  {
    if (isset($values)) {
      parent::loadFromArray($values);
    }
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

  public static function create($params = null)
  {
    $class = get_called_class();

    return parent::_scpCreate($class, $params);
  }

  public function cancel($params = null)
  {
    return parent::_customAction('put', 'cancel', $params);
  }

  public function sendEmail($params = null)
  {
    return parent::_customAction('post', 'email', $params);
  }

  public function sendSms($params = null)
  {
    return parent::_customAction('post', 'sms', $params);
  }

  public static function all($params = null)
  {
    $class = get_called_class();

    return parent::_scpWhere($class, $params);
  }
}
