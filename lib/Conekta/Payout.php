<?php

namespace Conekta;

class Payout extends ConektaResource
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
}
