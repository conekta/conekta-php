<?php

namespace Conekta;

use \ArrayObject;
use \Conekta\Util;

class ConektaObject extends ArrayObject
{
  protected $_values;

  public function __construct($id = null)
  {
    $this->_values = array();
    $this->id = $id;
  }

  public function _setVal($object, $val)
  {
    $this->_values[$object] = $val;
    $this[$object] = $val;
  }

  public function _unsetKey($object)
  {
    unset($this->_values[$object]);
    unset($object);
  }

  public function loadFromArray($values)
  {
    foreach ($values as $object => $val) {
      if (is_array($val)) {
        $val = Util::convertToConektaObject($val);
      }
      if (strpos(get_class($this), 'ConektaObject') !== false) {
        $this[$object] = $val;
      } else {
        if (strpos($object, 'url') !== false && strpos(get_class($this), 'Webhook') !== false) {
          $object = "webhook_url";
        }
        $this->$object = $val;
        if ($object == "metadata") {
          $this->metadata = new ConektaObject();
          if (is_array($val) || is_object($val)) {
            foreach ($val as $object2 => $val2) {
              $this->metadata->$object2 = $val2;
              $this->metadata->_setVal($object2, $val2);
            }
          }
        }
      }
      $this->_setVal($object, $val);
    }
  }

  public function __toJSON()
  {
    if (defined('JSON_PRETTY_PRINT')) {
      return json_encode($this->_toArray(), JSON_PRETTY_PRINT);
    } else {
      return json_encode($this->_toArray());
    }
  }

  protected function _toArray()
  {
    $array = array();
    foreach ($this->_values as $object => $val) {
      if (is_object($val) == true && get_class($val) != '') {
        if (empty($val->_values) != true) {
          $array[$object] = $val->_toArray();
        }
      } else {
        $array[$object] = $val;
      }
    }

    return $array;
  }

  public function __toString()
  {
    return $this->__toJSON();
  }

  public function offsetGet($offset)
  {
    return isset($this->_values[$offset]) ? $this->_values[$offset] : null;
  }
}
