<?php

namespace Conekta;

class TaxLine extends ConektaResource
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
     * @return TaxLine
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): TaxLine
    {
        return parent::_update($params);
    }

    /**
     * @return TaxLine
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function delete(): TaxLine
    {
        return parent::_delete('order', 'tax_lines');
    }
}
