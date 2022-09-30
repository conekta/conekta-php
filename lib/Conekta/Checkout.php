<?php

namespace Conekta;

class Checkout extends ConektaResource
{
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
     * @param null $params
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
     * @param null $params
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
     * @param null $params
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
    public static function all($params = null): ConektaList|ConektaObject
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
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
    }

    /**
     * @param null $params
     * @return Checkout
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function cancel($params = null): Checkout
    {
        return parent::_customAction('put', 'cancel', $params);
    }

    /**
     * @param null $params
     * @return Checkout
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function sendEmail($params = null): Checkout
    {
        return parent::_customAction('post', 'email', $params);
    }

    /**
     * @param null $params
     * @return Checkout
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function sendSms($params = null): Checkout
    {
        return parent::_customAction('post', 'sms', $params);
    }
}
