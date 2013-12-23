<?php
class Conekta_Error extends Exception
{
	public function __construct($message, $type, $code, $params) {
		parent::__construct($message);
		$this->message = $message;
		$this->type = $type;
		$this->code = $code;
		$this->params = $params;
	}
	
	public static function errorHandler($resp, $code) {
		$resp = json_decode($resp, true);
		$message = $resp['message'];
		$type = $resp['type'];
		$params = $resp['params'];
		if (isset($code) != true) {
			throw new Conekta_Error('Could not connect to '.Conekta::$apiBase, $type, $code, $params);
		}
		switch ($code) {
			case 400:
				throw new Conekta_MalformedRequestError($message, $type, $code, $params);
			case 401:
				throw new Conekta_AuthenticationError($message, $type, $code, $params);
			case 402:
				throw new Conekta_ProcessingError($message, $type, $code, $params);
			case 404:
				throw new Conekta_ResourceNotFoundError($message, $type, $code, $params);
			case 422:
				throw new Conekta_ParameterValidationError($message, $type, $code, $params);
			case 500:
				throw new Conekta_ApiError($message, $type, $code, $params);
			default:
				throw new Conekta_Error($message, $type, $code, $params);
		}
	}
}

class Conekta_ApiError extends Conekta_Error {
	
}

class Conekta_AuthenticationError extends Conekta_Error {
	
}

class Conekta_ParameterValidationError extends Conekta_Error {
	
}

class Conekta_ProcessingError extends Conekta_Error {
	
}

class Conekta_ResourceNotFoundError extends Conekta_Error {
	
}

class Conekta_MalformedRequestError extends Conekta_Error {
	
}
?>
