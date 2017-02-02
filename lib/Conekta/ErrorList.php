<?php

namespace Conekta;

use \Conekta\Conekta;
use \Exception;

class ErrorList extends Exception
{
    public $details = [];

    public function __construct()
    {
        $this->details = [];
    }

    public static function errorHandler($response = null, $http_status = null)
    {
        $exception = null;
        $error_list = new ErrorList;
        if(isset($response['details'])){
            $error_list->message .= $response['details'][0]['message'];
            foreach ($response['details'] as $error) {
                array_push($error_list->details, self::buildError($error, $http_status));
            }
            if (count($error_list->details) == 0) {
               array_push($error_list->details, self::buildError(null, null));
            }
            $exception = $error_list;
        }
        if(is_null($exception)) {
            array_push($error_list->details, self::buildError(null, null));
            $exception = $error_list;
        }
        return $exception;
    }

    private static function buildError($response, $http_status)
    {
        return Error::build($response, $http_status);
    }
}
