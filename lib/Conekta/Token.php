<?php

namespace Conekta;

class Token extends ConektaResource
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
     * @deprecated
     */
    public static function retrieve($id): mixed
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }
}
