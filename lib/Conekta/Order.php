<?php

namespace Conekta;

class Order extends ConektaResource
{
     public $livemode = '';
     public $amount = '';
     public $paymentStatus = '';
     public $customerId = '';
     public $currency = '';
     public $capture = '';
     public $metadata = '';
     public $createdAt = '';
     public $updatedAt = '';
     public $tax_lines;
     public $shipping_lines;
     public $returns;
     public $discount_lines;
     public $line_items;
     public $charges;

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        }
    }

    public function __isset($property)
    {
        return isset($this->{$property});
    }

    public function loadFromArray($values = null)
    {
        if (isset($values)) {
            parent::loadFromArray($values);
        }

        $submodules = [
      'tax_lines', 'shipping_lines', 'discount_lines', 'line_items', 'charges', 'returns'
      ];

        foreach ($submodules as $submodule) {
            if (isset($values[$submodule])) {
                $submoduleList = new ConektaList($submodule);
                $submoduleList->loadFromArray($values[$submodule]);
                $this->{$submodule}->_values = $submoduleList;
                $this->{$submodule} = $submoduleList;

                foreach ($this->{$submodule} as $object => $val) {
                    $val->order = $this;
                }
            } else {
                $this->{$submodule} = new ConektaList($submodule, []);
            }
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

    public function void(?array $params = [])
    {
        return parent::_customAction('post', 'void', $params);
    }

    public function createTaxLine($params = null)
    {
        return parent::_createMemberWithRelation('tax_lines', $params, $this);
    }

    public function createShippingLine($params = null)
    {
        return parent::_createMemberWithRelation('shipping_lines', $params, $this);
    }

    public function createDiscountLine($params = null)
    {
        return parent::_createMemberWithRelation('discount_lines', $params, $this);
    }

    public function createLineItem($params = null)
    {
        return parent::_createMemberWithRelation('line_items', $params, $this);
    }

    public function createCharge($params = null)
    {
        return parent::_createMember('charges', $params);
    }

    public function refund($params = null)
    {
        return parent::_customAction('post', 'refund', $params);
    }
}
