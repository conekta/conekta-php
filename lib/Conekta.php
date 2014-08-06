<?php
if (!function_exists('curl_init')) {
  throw new Exception('Conekta needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Conekta needs the JSON PHP extension.');
}
if (!function_exists('mb_detect_encoding')) {
  throw new Exception('Conekta needs the Multibyte String PHP extension.');
}
if (!function_exists('get_called_class')) {
	throw new Exception('Conekta needs to be run on PHP >= 5.3.0.');
}
require(dirname(__FILE__) . '/locales/Lang.php');
require(dirname(__FILE__) . '/Conekta/Conekta.php');
require(dirname(__FILE__) . '/Conekta/Util.php');
require(dirname(__FILE__) . '/Conekta/Requestor.php');
require(dirname(__FILE__) . '/Conekta/Object.php');
require(dirname(__FILE__) . '/Conekta/Resource.php');

require(dirname(__FILE__) . '/Conekta/Charge.php');
require(dirname(__FILE__) . '/Conekta/PaymentMethod.php');
require(dirname(__FILE__) . '/Conekta/Customer.php');
require(dirname(__FILE__) . '/Conekta/Card.php');
require(dirname(__FILE__) . '/Conekta/Plan.php');
require(dirname(__FILE__) . '/Conekta/Subscription.php');
require(dirname(__FILE__) . '/Conekta/Token.php');
require(dirname(__FILE__) . '/Conekta/Event.php');
require(dirname(__FILE__) . '/Conekta/Error.php');
require(dirname(__FILE__) . '/Conekta/Payout.php');
require(dirname(__FILE__) . '/Conekta/Payee.php');
require(dirname(__FILE__) . '/Conekta/PayoutMethod.php');
require(dirname(__FILE__) . '/Conekta/Method.php');
require(dirname(__FILE__) . '/Conekta/Address.php');
?>
