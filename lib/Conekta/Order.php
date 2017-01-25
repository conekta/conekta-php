<?php

namespace Conekta;

use \Conekta\Resource;

class Order extends Resource
{
    var $livemode    = "";
    var $amount      = "";
    var $status      = "";
    var $customer_id = "";
    var $currency    = "";
    var $capture     = "";
    var $metadata    = "";
    var $created_at  = "";
    var $updated_at  = "";
    
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

        $submodels = array(
            'tax_lines', 'shipping_lines', 'discount_lines', 'line_items', 'charges', 'returns'
        );

        foreach ($submodels as $submodel) {
            if(isset($values[$submodel])){
                $submodel_list = new ConektaList($submodel);
                $submodel_list->loadFromArray($values[$submodel]);
                $this->$submodel->_values = $submodel_list;
                $this->$submodel = $submodel_list;

                foreach ($this->$submodel as $k => $v) {
                    $v->order = $this;
                }
            }else{
                $this->$submodel = new ConektaList($submodel, array());
            }
        }

        if (isset($this->fiscal_entity)) {
            $this->fiscal_entity->order = $this;
        }
    }

    public static function where($params = null)
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }

    public function update($params = null)
    {
        return parent::_update($params);
    }

    public static function create($params = null)
    {
        $class = get_called_class();

        return parent::_scpCreate($class, $params);
    }

    public static function find($id)
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }

    public function capture()
    {
        return parent::_customAction('put', 'capture', null);
    }

    public function createTaxLine($params = null)
    {
        return parent::_createMember('tax_lines', $params);
    }

    public function createShippingLine($params = null)
    {
        return parent::_createMember('shipping_lines', $params);
    }

    public function createDiscountLine($params = null)
    {
        return parent::_createMember('discount_lines', $params);
    }

    public function createLineItem($params = null)
    {
        return parent::_createMember('line_items', $params);
    }

    public function createFiscalEntity($params = null)
    {
        $order = parent::_update(array('fiscal_entity' => $params));

        return $order->fiscal_entity;
    }

    public function createCharge($params = null)
    {
        return parent::_createMember('charges', $params);
    }

    public function createReturn($params = null)
    {
      return parent::_createMember('returns', $params);
    }
}
