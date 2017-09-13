<?php

namespace Conekta;

use \Conekta\ConektaResource;
use \Conekta\Lang;
use \Conekta\Exceptions;
use \Conekta\Conekta;

class ShippingContact extends ConektaResource
{
  var $receiver       = "";
  var $phone          = "";
  var $betweenStreets = "";
  var $parentId       = "";
  var $default        = "";

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


  public function instanceUrl()
  {
    $this->apiVersion = Conekta::$apiVersion;
    $id = $this->id;
    parent::idValidator($id);
    $class = get_class($this);
    $base = $this->classUrl($class);
    $extn = urlencode($id);
    $customerUrl = $this->customer->instanceUrl();
    
    return $customerUrl . $base . "/{$extn}";
  }

  public function update($params = null)
  {
    return parent::_update($params);
  }

  public function delete()
  {
    return parent::_delete('customer', 'shipping_contacts');
  }
}
