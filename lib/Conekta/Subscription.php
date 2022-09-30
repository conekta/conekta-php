<?php

namespace Conekta;

class Subscription extends ConektaResource
{
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
        $base = '/subscription';
        $customerUrl = $this->customer->instanceUrl();

        return $customerUrl . $base;
    }

    /**
     * @param $params
     * @return Subscription
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): Subscription
    {
        return parent::_update($params);
    }

    /**
     * @return Subscription
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function cancel(): Subscription
    {
        return parent::_customAction('post', 'cancel');
    }

    /**
     * @return Subscription
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function pause(): Subscription
    {
        return parent::_customAction('post', 'pause');
    }

    /**
     * @return Subscription
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function resume(): Subscription
    {
        return parent::_customAction('post', 'resume');
    }
}
