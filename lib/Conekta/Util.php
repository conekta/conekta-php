<?php
abstract class Conekta_Util
{
	public static $types = array(
		'billing_address' => 'Conekta_Address',
		'bank_transfer_payout_method' => 'Conekta_Method',
		'payout' => 'Conekta_Payout',
		'payee' => 'Conekta_Payee',
		'payout_method' => 'Conekta_Payout_Method',
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
			if (isset($resp['street1']) || isset($resp['street2'])) {
				$class = "Conekta_Address";
				$instance = new $class();
				$instance->loadFromArray($resp);
				return $instance;
			}
			if (current($resp)) {
				$instance = new Conekta_Object();
				$instance->loadFromArray($resp);
				return $instance;
			}
			return new Conekta_Object();
		} 
		return $resp;
	}
	
	public static function shiftArray($array, $k) {
		unset($array[$k]);
		end($array);
		$lastKey = key($array);
		
		for ($i = $k; $i < $lastKey; ++ $i) {
			$array[$i] = $array[$i+1];
			unset($array[$i+1]);
		}
		
		return $array;
	}
}
?>
