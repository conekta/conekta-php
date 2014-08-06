<?php
class Conekta_Error extends Exception
{
	public function __construct($message=null, $message_to_purchaser=null, $type=null, $code=null, $params=null) {
		parent::__construct($message);
		$this->message = $message;
		$this->message_to_purchaser = $message_to_purchaser;
		$this->type = $type;
		$this->code = $code;
		$this->params = $params;
	}
	
	public static function errorHandler($resp, $code) {
		$resp = json_decode($resp, true);
		$message = isset($resp['message']) ? $resp['message'] : null;
		$message_to_purchaser = isset($resp['message_to_purchaser']) ? $resp['message_to_purchaser'] : null;
		$type = isset($resp['type']) ? $resp['type'] : null;
		$params = isset($resp['param']) ? $resp['param'] : null;
		if (isset($code) != true || $code == 0) {
			throw new Conekta_NoConnectionError(
				LANG::translate('error.requestor.connection', array('BASE'=>Conekta::$apiBase), LANG::EN),
				LANG::translate('error.requestor.connection_purchaser', null, Conekta::$locale),
				$type, $code, $params);
		}
		switch ($code) {
			case 400:
				throw new Conekta_MalformedRequestError($message, $message_to_purchaser, $type, $code, $params);
			case 401:
				throw new Conekta_AuthenticationError($message, $message_to_purchaser, $type, $code, $params);
			case 402:
				throw new Conekta_ProcessingError($message, $message_to_purchaser, $type, $code, $params);
			case 404:
				throw new Conekta_ResourceNotFoundError($message, $message_to_purchaser, $type, $code, $params);
			case 422:
				throw new Conekta_ParameterValidationError($message, $message_to_purchaser, $type, $code, $params);
			case 500:
				throw new Conekta_ApiError($message, $message_to_purchaser, $type, $code, $params);
			default:
				throw new Conekta_Error($message, $message_to_purchaser, $type, $code, $params);
		}
	}
}

	class Conekta_ApiError extends Conekta_Error {
		
	}
	
	class Conekta_NoConnectionError extends Conekta_Error {
		
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
