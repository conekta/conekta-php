<?php

namespace Conekta;

class Event extends ConektaResource
{
    public $data = '';
    public $livemode = '';
    public $webhookStatus = '';
    public $createdAt = '';
    public $type = '';

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
     * @deprecated
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
}
