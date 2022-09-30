<?php

namespace Conekta;

class LineItem extends ConektaResource
{
    public $name = '';
    public $description = '';
    public $unitPrice = '';
    public $quantity = '';
    public $sku = '';
    public $shippable = '';
    public $tags = '';
    public $brand = '';
    public $type = '';
    public $parentId = '';

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
        $orderUrl = $this->order->instanceUrl();

        return $orderUrl . $base . "/{$extn}";
    }

    /**
     * @param $params
     * @return LineItem
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): LineItem
    {
        return parent::_update($params);
    }

    /**
     * @return LineItem
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function delete(): LineItem
    {
        return parent::_delete('order', 'line_items');
    }
}
