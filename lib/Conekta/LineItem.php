<?php

namespace Conekta;

use \Conekta\ConektaResource;
use \Conekta\Lang;
use \Conekta\Exceptions;
use \Conekta\Conekta;

class LineItem extends ConektaResource
{
  var $name        = "";
  var $description = "";
  var $unitPrice   = "";
  var $quantity    = "";
  var $sku         = "";
  var $shippable   = "";
  var $tags        = "";
  var $brand       = "";
  var $type        = "";
  var $parentId    = "";

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
    $orderUrl = $this->order->instanceUrl();
    
    return $orderUrl . $base . "/{$extn}";
  }

  public function update($params = null)
  {
    return parent::_update($params);
  }

  public function delete()
  {
    return parent::_delete('order', 'line_items');
  }
}
