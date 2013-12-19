<?php
abstract class Conekta_Util
{
	public static $types = array(
		'card_payment' => 'Conekta_Payment_Method',
		'cash_payment' => 'Conekta_Payment_Method',
		'bank_transfer_payment' => 'Conekta_Payment_Method',
		'card' => 'Conekta_Card',
		'charge' => 'Conekta_Charge',
		'customer' => 'Conekta_Customer',
		'event' => 'Conekta_Event',
		'plan' => 'Conekta_Plan',
		'subscription' => 'Conekta_Subscription'
	);
	
	public static function convertToConektaObject($resp)
	{
		$types = self::$types;
		if (is_array($resp)) 
		{
			if (isset($resp['object']) && is_string($resp['object']) && isset($types[$resp['object']]))
			{
				$class = $types[$resp['object']];
				$instance = new $class();
				$instance->loadFromArray($resp);
				return $instance;
			}
			if (is_array($resp[0])) {
				$instance = new Conekta_Object();
				$instance->loadFromArray($resp);
				return $instance;
			}
		} 
		return $resp;
	}
}
?>
