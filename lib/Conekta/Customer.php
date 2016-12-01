<?php

namespace Conekta;

use \Conekta\Resource;

class Customer extends Resource
{
    public function loadFromArray($values = null)
    {
        if (isset($values)) {
            parent::loadFromArray($values);
        }

        if(isset($this->cards)){
            foreach ($this->cards as $k => $v) {
                if (isset($v->deleted) != true) {
                    $v->customer = $this;
                    $this->cards[$k] = $v;
                }
            }
        }

        if(isset($this->sources)){
            foreach ($this->sources as $k => $v) {
                if (isset($v->deleted) != true) {
                    $v->customer = $this;
                    $this->sources[$k] = $v;
                }
            }
        }

        if(isset($this->fiscal_entities)){
            foreach ($this->fiscal_entities as $k => $v) {
                if (isset($v->deleted) != true) {
                    $v->customer = $this;
                    $this->fiscal_entities[$k] = $v;
                }
            }
        }

        if(isset($this -> shipping_contacts)){
            foreach ($this->shipping_contacts as $k => $v) {
                if (isset($v->deleted) != true){
                    $v->customer = $this;
                    $this->shipping_contacts[$k] = $v;
                }
            }
        }

        if (isset($this->subscription)) {
            $this->subscription->customer = $this;
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

    public function createSource($params = null)
    {
        return parent::_createMember('sources', $params);
    }

    public function createFiscalEntity($params = null)
    {
        return parent::_createMember('fiscal_entities', $params);
    }

    public function createCard($params = null)
    {
        return parent::_createMember('cards', $params);
    }

    public function createSubscription($params = null)
    {
        return parent::_createMember('subscription', $params);
    }

    public function createShippingContact($params = null)
    {
        return parent::_createMember('shipping_contacts', $params);
    }

    /**
     * @deprecated
     */
    public static function retrieve($id)
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }

    public static function all($params = null)
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }
}
