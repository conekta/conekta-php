<?php 

namespace Conekta;

use \Conekta\Lang;
use \Conekta\Conekta;
use \Exception;

class Error extends Exception
{

    public function __get($property)
    {   
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function  __isset($property)
    {
        return isset($this->$property);
    }
    
    public static function build($resp, $http_code)
    {
        $message = isset($resp['message']) ? $resp['message'] : null;
        $message_to_purchaser = isset($resp['message_to_purchaser']) ? $resp['message_to_purchaser'] : null;
        $type = isset($resp['type']) ? $resp['type'] : null;
        $params = isset($resp['param']) ? $resp['param'] : null;

        $debug_message = isset($resp['debug_message']) ? $resp['debug_message'] : null;
        $code = isset($resp['code']) ? $resp['code'] : null;

        if (isset($http_code) != true || $http_code == 0) {
            return new NoConnectionError(
                Lang::translate('error.requestor.connection', Lang::EN, array('BASE' => Conekta::$apiBase)),
                Lang::translate('error.requestor.connection_purchaser', Conekta::$locale),
                $type, $http_code, $params);
        }

        switch ($http_code) {
            case 400:
                return new MalformedRequestError($message, $message_to_purchaser, $type, $code, $params);
            case 401:
                return new AuthenticationError($message, $message_to_purchaser, $type, $code, $params);
            case 402:
                return new ProcessingError($message, $message_to_purchaser, $type, $code, $params);
            case 404:
                return new ResourceNotFoundError($message, $message_to_purchaser, $type, $code, $params);
            case 422:
                return new ParameterValidationError($message, $message_to_purchaser, $type, $code, $params);
            case 500:
                return new ApiError($message, $message_to_purchaser, $type, $code, $params);
            default:
                return new self($message, $message_to_purchaser, $type, $code, $params);
        }
    }

    public function __construct($message = null, $message_to_purchaser = null, $type = null, $code = null, $params = null)
    {
        parent::__construct($message);
        $this->message = $message;
        $this->message_to_purchaser = $message_to_purchaser;
        $this->type = $type;
        $this->code = $code;
        $this->params = $params;
    }

    public static function errorHandler($resp, $http_code)
    {
        throw self::build($resp, $http_code);
    }
}

class ApiError extends Error
{
}

class NoConnectionError extends Error
{
}

class AuthenticationError extends Error
{
}

class ParameterValidationError extends Error
{
}

class ProcessingError extends Error
{
}

class ResourceNotFoundError extends Error
{
}

class MalformedRequestError extends Error
{
}
