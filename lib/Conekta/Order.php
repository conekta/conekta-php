<?php 

namespace Conekta;

use \Conekta\Resource;

class Order extends Resource
{

    public function loadFromArray($values = null)
    {
        if (isset($values)) {
            parent::loadFromArray($values);
        }

        $submodels = array(
            'tax_lines', 'shipping_lines', 'discount_lines', 'line_items'
        );

        foreach ($submodels as $submodel) {
            $submodel_collection = $this->$submodel;

            foreach ($submodel_collection as $k => $v){
                if (isset($v->deleted) != true) {
                    $v->order = $this;
                    $this->$submodel[$k] = $v;
                }
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
}
