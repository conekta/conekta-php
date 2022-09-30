<?php

namespace Conekta;

class Payee extends ConektaResource
{
    public $email = '';
    public $name = '';
    public $phone = '';
    public $livemode = '';
    public $defaultDestinationId = '';
    public $createdAt = '';

    /**
     * @param $id
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public static function find($id): mixed
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }

    /**
     * @param $params
     * @return ConektaList|ConektaObject
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public static function where($params = null): ConektaList|ConektaObject
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public static function create($params = null): mixed
    {
        $class = get_called_class();

        return parent::_scpCreate($class, $params);
    }

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
     * @param $values
     * @return void
     */
    public function loadFromArray($values = null): void
    {
        if (isset($values)) {
            parent::loadFromArray($values);
        }
        foreach ($this->payout_methods as $object => $val) {
            if (isset($val->deleted) != true) {
                $val->payee = &$this;
                $this->payout_methods[$object] = $val;
            }
        }

        if (isset($this->subscription)) {
            $this->subscription->customer = &$this;
        }
    }

    /**
     * @return Payee
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function delete(): Payee
    {
        return parent::_delete();
    }

    /**
     * @param $params
     * @return Payee
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): Payee
    {
        return parent::_update($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function createPayoutMethod($params = null): mixed
    {
        return parent::_createMember('payout_methods', $params);
    }
}
