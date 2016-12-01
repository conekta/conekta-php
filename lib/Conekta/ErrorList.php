<?php

namespace Conekta;

use \Conekta\Conekta;
use \Exception;

class ErrorList extends Exception
{
  public $details=[];

    public function __construct()
    {
        $this->details = [];
    }

    public static function errorHandler($response = null, $http_status = null)
    {
        $exception = null;
        $errorList = new ErrorList;
        if(isset($response['details']))
        {
            foreach ($response['details'] as $error) {
                array_push($errorList->details, self::buildError($error, $http_status));
            }
            if (count($errorList->details) == 0)
            {
               array_push($errorList->details, self::buildError(null, null));
            }
            $exception = $errorList;
        }
        if(is_null($exception))
        {
            array_push($errorList->details, self::buildError(null, null));
            $exception = $errorList;
        }
        throw $exception;
    }

    private static function buildError($response, $http_status)
    {
        return Error::errorHandler($response, $http_status);
    }
}