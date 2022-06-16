<?php

namespace Conekta;

class Address extends ConektaResource
{
    public string $street1;
    public string $street2;
    public string $street3;
    public string $city;
    public string $state;
    public string $zip;
    public string $country;

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
}
