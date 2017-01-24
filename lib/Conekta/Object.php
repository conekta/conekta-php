<?php 

namespace Conekta;

use \ArrayObject;
use \Conekta\Util;

class Object extends ArrayObject
{
    protected $_values;

    public function __construct($id = null)
    {
        $this->_values = array();
        $this->id = $id;
    }

    public function _setVal($k, $v)
    {
        $this->_values[$k] = $v;
        $this[$k] = $v;
    }

    public function _unsetKey($k)
    {
        unset($this->_values[$k]);
        unset($k);
    }

    public function loadFromArray($values)
    {
        foreach ($values as $k => $v) {
            if (is_array($v)) {
                $v = Util::convertToConektaObject($v);
            }
            if (strpos(get_class($this), 'Object') !== false) {
                $this[$k] = $v;
            } else {
                if (strpos($k, 'url') !== false && strpos(get_class($this), 'Webhook') !== false) {
                    $k = "webhook_url";
                }
                $this->$k = $v;
                if ($k == "metadata") {
                    $this->metadata = new Object();
                    if (is_array($v) || is_object($v)) {
                        foreach ($v as $k2 => $v2) {
                            $this->metadata->$k2 = $v2;
                            $this->metadata->_setVal($k2, $v2);
                        }
                    }
                }
            }
            $this->_setVal($k, $v);
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
        foreach ($this->_values as $k => $v) {
            if (is_object($v) == true && get_class($v) != '') {
                if (empty($v->_values) != true) {
                    $array[$k] = $v->_toArray();
                }
            } else {
                $array[$k] = $v;
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
