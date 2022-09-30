<?php

namespace Conekta;

use Exception;

class Handler extends Exception
{
    /**
     * @param $message
     * @param $messageToPurchaser
     * @param $type
     * @param $code
     * @param $params
     * @param array|null $errorStack
     */
    public function __construct(
        public        $message = '',
        public        $messageToPurchaser = null,
        public        $type = null,
        public        $code = null,
        public        $params = null,
        public ?array $errorStack = null
    )
    {
        parent::__construct($message); // constructor for Exception inheritance passing message value
    }

    /**
     * @param $resp
     * @param $httpCode
     * @return ApiError|AuthenticationError|Handler|MalformedRequestError|NoConnectionError|ParameterValidationError|ProcessingError|ResourceNotFoundError|Exception
     */
    public static function errorHandler($resp, $httpCode): NoConnectionError|ResourceNotFoundError|ProcessingError|AuthenticationError|ApiError|Exception|MalformedRequestError|Handler|ParameterValidationError
    {
        return Handler::build($httpCode, $resp);
    }

    /**
     * @param $httpCode
     * @param $resp
     * @return ApiError|AuthenticationError|Handler|MalformedRequestError|NoConnectionError|ParameterValidationError|ProcessingError|ResourceNotFoundError
     */
    public static function build($httpCode, $resp = null): NoConnectionError|ResourceNotFoundError|ProcessingError|AuthenticationError|ApiError|MalformedRequestError|Handler|ParameterValidationError
    {
        if (!isset($httpCode) || $httpCode == 0) {
            return new NoConnectionError(
                Lang::translate('error.requestor.connection', Lang::EN, ['BASE' => Conekta::$apiBase]),
                Lang::translate('error.requestor.connection_purchaser', Conekta::$locale)
            );
        }
        $type = self::assignIfSet($resp, 'type');
        $errorStack = [];
        if (array_key_exists('details', $resp)) { //API 2.0.0
            foreach ($resp['details'] as $params) {
                //parameter validation
                $errorStack['details'][] = $params;
                $message = self::assignIfSet($params, 'message');
                $messageToPurchaser = self::assignIfSet($params, 'message_to_purchaser');
                $param = self::assignIfSet($params, 'params');
                $debugMessage = self::assignIfSet($params, 'debug_message');
                $code = self::assignIfSet($params, 'code');
            }
        } else {//API 1.0.0
            //parameter validation
            $errorStack = $resp;
            $message = self::assignIfSet($resp, 'message');
            $messageToPurchaser = self::assignIfSet($resp, 'message_to_purchaser');
            $param = self::assignIfSet($resp, 'params');
            $debugMessage = self::assignIfSet($resp, 'debug_message');
            $code = self::assignIfSet($resp, 'code');
        }
        $errorStack['type'] = ['error_type' => $type, 'error_code' => $httpCode];
        switch ($httpCode) {
            case 400:
                return new MalformedRequestError($message, $messageToPurchaser, $type, $code, $param, $errorStack);
            case 401:
                return new AuthenticationError($message, $messageToPurchaser, $type, $code, $param, $errorStack);
            case 402:
                return new ProcessingError($message, $messageToPurchaser, $type, $code, $param, $errorStack);
            case 404:
                return new ResourceNotFoundError($message, $messageToPurchaser, $type, $code, $param, $errorStack);
            case 422:
                return new ParameterValidationError($message, $messageToPurchaser, $type, $code, $param, $errorStack);
            case 500:
                return new ApiError($message, $messageToPurchaser, $type, $code, $param, $errorStack);
            default:
                return new self($message, $messageToPurchaser, $type, $code, $param, $errorStack);
        }
    }

    /**
     * @param $parameter
     * @param $index
     * @return null
     */
    public static function assignIfSet($parameter, $index)
    {
        if (array_key_exists($index, $parameter)) {
            return $parameter[$index] ?? null;
        }

        return null;
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
     * @return mixed
     */
    public function getConektaMessage(): mixed
    {
        return json_decode($this->errorStack);
    }
}
