<?php

namespace Conekta;

class PayoutMethod extends ConektaResource
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
        $payeeUrl = $this->payee->instanceUrl();

        return $payeeUrl . $base . "/{$extn}";
    }

    /**
     * @param $params
     * @return PayoutMethod
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): PayoutMethod
    {
        return parent::_update($params);
    }

    /**
     * @return PayoutMethod
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function delete(): PayoutMethod
    {
        return parent::_delete('payee', 'payout_methods');
    }
}
