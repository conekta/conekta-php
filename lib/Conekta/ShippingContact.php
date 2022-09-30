<?php

namespace Conekta;

class ShippingContact extends ConektaResource
{
    public $receiver = '';
    public $phone = '';
    public $betweenStreets = '';
    public $parentId = '';
    public $default = '';

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

    /**
     * @return string
     * @throws NoConnectionError
     * @throws ParameterValidationError
     */
    public function instanceUrl(): string
    {
        $this->apiVersion = Conekta::$apiVersion;
        $id = $this->id;
        parent::idValidator($id);
        $class = get_class($this);
        $base = $this->classUrl($class);
        $extn = urlencode($id);
        $customerUrl = $this->customer->instanceUrl();

        return $customerUrl . $base . "/{$extn}";
    }

    /**
     * @param $params
     * @return ShippingContact
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): ShippingContact
    {
        return parent::_update($params);
    }

    /**
     * @return ShippingContact
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function delete(): ShippingContact
    {
        return parent::_delete('customer', 'shipping_contacts');
    }
}
