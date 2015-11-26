<?php namespace Conekta;

class Error extends \Exception
{
    public function __construct($message = null, $message_to_purchaser = null, $type = null, $code = null, $params = null)
    {
        parent::__construct($message);
        $this->message = $message;
        $this->message_to_purchaser = $message_to_purchaser;
        $this->type = $type;
        $this->code = $code;
        $this->params = $params;
    }

    public static function errorHandler($resp, $code)
    {
        $resp = json_decode($resp, true);
        $message = isset($resp['message']) ? $resp['message'] : null;
        $message_to_purchaser = isset($resp['message_to_purchaser']) ? $resp['message_to_purchaser'] : null;
        $type = isset($resp['type']) ? $resp['type'] : null;
        $params = isset($resp['param']) ? $resp['param'] : null;
        if (isset($code) != true || $code == 0) {
            throw new NoConnectionError(
                LANG::translate('error.requestor.connection', array('BASE' => Conekta::$apiBase), LANG::EN),
                LANG::translate('error.requestor.connection_purchaser', null, Conekta::$locale),
                $type, $code, $params);
        }
        switch ($code) {
            case 400:
                throw new MalformedRequestError($message, $message_to_purchaser, $type, $code, $params);
            case 401:
                throw new AuthenticationError($message, $message_to_purchaser, $type, $code, $params);
            case 402:
                throw new ProcessingError($message, $message_to_purchaser, $type, $code, $params);
            case 404:
                throw new ResourceNotFoundError($message, $message_to_purchaser, $type, $code, $params);
            case 422:
                throw new ParameterValidationError($message, $message_to_purchaser, $type, $code, $params);
            case 500:
                throw new ApiError($message, $message_to_purchaser, $type, $code, $params);
            default:
                throw new self($message, $message_to_purchaser, $type, $code, $params);
        }
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
