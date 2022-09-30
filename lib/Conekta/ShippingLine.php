<?php

namespace Conekta;

class ShippingLine extends ConektaResource
{
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
     * @return ShippingLine
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): ShippingLine
    {
        return parent::_update($params);
    }

    /**
     * @return ShippingLine
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function delete(): ShippingLine
    {
        return parent::_delete('order', 'shipping_lines');
    }
}
