<?php 

namespace Conekta;

use \Conekta\Resource;

class Address extends Resource
{
	var $street1  = "";
	var $street2  = "";
	var $street3  = "";
	var $city     = "";
	var $state    = "";
	var $zip      = "";
	var $country  = "";

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

}
