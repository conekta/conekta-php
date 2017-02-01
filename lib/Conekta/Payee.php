<?php 

namespace Conekta;

use \Conekta\Resource;

class Payee extends Resource
{
    var $email                  = "";
    var $name                   = "";
    var $phone                  = "";
    var $livemode               = "";
    var $default_destination_id = "";
    var $created_at             = "";

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
        foreach ($this->payout_methods as $k => $v) {
            if (isset($v->deleted) != true) {
                $v->payee = &$this;
                $this->payout_methods[$k] = $v;
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
