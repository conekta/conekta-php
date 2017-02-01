<?php

namespace Conekta;

use \Conekta\Resource;
use \Conekta\Lang;
use \Conekta\Error;
use \Conekta\Conekta;

class FiscalEntity extends Resource
{
    var $tax_id         = "";
    var $company_name   = "";
    var $phone          = "";
    var $email          = "";
    var $created_at     = "";
    var $parent_id      = "";
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
        $id = $this->id;
        if (!$id) {
            throw new Error(
                Lang::translate('error.resource.id', Lang::EN, array('RESOURCE' => get_class())),
                Lang::translate('error.resource.id_purchaser', Conekta::$locale)
            );
        }

        $class = get_class($this);
        $base = '/fiscal_entities';
        $extn = urlencode($id);
        $customerUrl = $this->customer->instanceUrl();

        return $customerUrl . $base . "/{$extn}";
    }

    public function delete() {
        return parent::_delete('customer', 'fiscal_entities');
    }

    public function update($params = null) {
        return parent::_update($params);
    }
}
