<?php

namespace Conekta;

class PaymentSource extends ConektaResource
{
    /**
     * @const string
     */
    public const TYPE_CARD = 'card';
    /**
     * @const string
     */
    public const TYPE_OXXO_RECURRENT = 'oxxo_recurrent';

    /**
     * @return string
     * @throws ParameterValidationError
     */
    public function instanceUrl(): string
    {
        $this->apiVersion = Conekta::$apiVersion;
        $id = $this->id;
        parent::idValidator($id);
        $class = get_class($this);
        $base = '/payment_sources';
        $extn = urlencode($id);
        $customerUrl = $this->customer->instanceUrl();

        return $customerUrl . $base . "/{$extn}";
    }

    /**
     * @param $params
     * @return PaymentSource
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): PaymentSource
    {
        return parent::_update($params);
    }

    /**
     * @return PaymentSource
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function delete(): PaymentSource
    {
        return parent::_delete('customer', 'payment_sources');
    }

    /**
     * Method for determine if is card
     * @return boolean
     */
    public function isCard(): bool
    {
        return $this['type'] == self::TYPE_CARD;
    }

    /**
     * Method for determine if is oxxo recurrent
     * @return boolean
     */
    public function isOxxoRecurrent(): bool
    {
        return $this['type'] == self::TYPE_OXXO_RECURRENT;
    }
}
