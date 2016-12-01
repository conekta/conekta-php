<?php

namespace Conekta;

use \Conekta\Conekta;
use \Exception;

class ErrorList extends Exception
{
    public $details = [];

    public static function errorHandler($response = null, $http_status = null)
    {
        $exception = null;

        if(isset($response['details'])) {
            $errorList = new ErrorList;

            foreach ($response['details'] as $error) {
                array_push($errorList->details, self::buildError($error, $http_status));
            }

            if (count($errorList->details) == 0) {
                array_push($errorList->details, self::buildError(null, null));
            }

            $exception = $errorList;
        }

        if($exception == null) {
            $exception = self::buildError($response, $http_status);
        }

        throw $exception;
    }

    private static function buildError($response, $http_status)
    {
        Error::build($response, $http_status);
    }
}
