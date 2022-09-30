<?php

namespace Conekta;

class Address extends ConektaResource
{
    public $street1 = '';
    public $street2 = '';
    public $street3 = '';
    public $city = '';
    public $state = '';
    public $zip = '';
    public $country = '';

    /**
     * @param $property
     * @return void
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        }
    }

    /**
     * @param $property
     * @return bool
     */
    public function __isset($property)
    {
        return isset($this->{$property});
    }
}
