<?php

namespace Conekta;

use \Conekta\ConektaResource;

class Payee extends ConektaResource
{
  var $email                = "";
  var $name                 = "";
  var $phone                = "";
  var $livemode             = "";
  var $defaultDestinationId = "";
  var $createdAt            = "";

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
    foreach ($this->payout_methods as $object => $val) {
      if (isset($val->deleted) != true) {
        $val->payee = &$this;
        $this->payout_methods[$object] = $val;
      }
    }

    if (isset($this->subscription)) {
      $this->subscription->customer = &$this;
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

  public function delete()
  {
    return parent::_delete();
  }

  public function update($params = null)
  {
    return parent::_update($params);
  }

  public function createPayoutMethod($params = null)
  {
    return parent::_createMember('payout_methods', $params);
  }
}
