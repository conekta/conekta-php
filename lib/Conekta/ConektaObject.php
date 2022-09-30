<?php

namespace Conekta;

use ArrayObject;

class ConektaObject extends ArrayObject
{
    /**
     * @var array|ConektaList
     */
    protected array|ConektaList $_values;

    /**
     * @param $id
     */
    public function __construct($id = null)
    {
        $this->_values = [];
        $this->id = $id;
    }

    /**
     * @param $object
     * @return void
     */
    public function _unsetKey($object): void
    {
        unset($this->_values[$object], $object);
    }

    /**
     * @param $values
     * @return void
     */
    public function loadFromArray($values): void
    {
        foreach ($values as $object => $value) {
            if (is_array($value)) {
                $value = Util::convertToConektaObject($value);
            }
            if (str_contains(get_class($this), 'ConektaObject')) {
                $this[$object] = $value;
            } else {
                $this->addMember($object, $value);
            }
            $this->_setVal($object, $value);
        }
    }

    /**
     * @param $object
     * @param mixed $value
     * @return void
     */
    private function addMember($object, mixed $value): void
    {
        if (str_contains($object, 'url') && str_contains(get_class($this), 'Webhook')) {
            $object = 'webhook_url';
        }
        $this->{$object} = $value;
        if ($object == 'metadata') {
            $this->addMetaData($value);
        }
    }

    /**
     * @param $value
     * @return void
     */
    private function addMetaData($value): void
    {
        $this->metadata = new ConektaObject();
        if (is_array($value) || is_object($value)) {
            foreach ($value as $object2 => $val2) {
                $this->metadata->{$object2} = $val2;
                $this->metadata->_setVal($object2, $val2);
            }
        }
    }

    /**
     * @param $object
     * @param $val
     * @return void
     */
    public function _setVal($object, $val): void
    {
        $this->_values[$object] = $val;
        $this[$object] = $val;
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return $this->__toJSON();
    }

    /**
     * @return false|string
     */
    public function __toJSON(): bool|string
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode($this->_toArray(), JSON_PRETTY_PRINT);
        } else {
            return json_encode($this->_toArray());
        }
    }

    /**
     * @return array
     */
    protected function _toArray(): array
    {
        $array = [];
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

    /**
     * @param $offset
     * @return mixed
     */
    public function offsetGet($offset): mixed
    {
        return $this->_values[$offset] ?? null;
    }
}
