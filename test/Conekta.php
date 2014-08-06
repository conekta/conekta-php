<?php

// Set Api key for testing
function setApiKey()
{
	$apiEnvKey = getenv('CONEKTA_API');
	if (!$apiEnvKey)
	{
		$apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
	}
	Conekta::setApiKey($apiEnvKey);
}
function unsetApiKey()
{
	if (isset($env) == false) {
		$env = Conekta::setApiKey('');
	}
}

// Load test suite via composer or manually
$test_suite = @include_once(dirname(__FILE__).'/simpletest/autorun.php');

if (!$test_suite)
{
	  $test_suite = @include_once(dirname(__FILE__).'/../vendor/simpletest/simpletest/autorun.php');
}

if (!$test_suite)
{
	  echo "Test cases depend on SimpleTest.".
			"Download it at <http://www.simpletest.org/>, and either install it ".
			"in your PHP include_path or put it in the test/ directory.\n";
	  exit(1);
}

// Throw an exception on any error
function exception_error_handler($errno, $errstr, $errfile, $errline)
{
	throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}

set_error_handler('exception_error_handler');
error_reporting(E_ALL | E_STRICT);

// Load Conekta lib
require_once(dirname(__FILE__) . '/../lib/Conekta.php');

// Include tests
require_once(dirname(__FILE__) . '/Conekta/ChargeTest.php');
require_once(dirname(__FILE__) . '/Conekta/CustomerTest.php');
require_once(dirname(__FILE__) . '/Conekta/EventTest.php');
require_once(dirname(__FILE__) . '/Conekta/PlanTest.php');
require_once(dirname(__FILE__) . '/Conekta/ErrorTest.php');
require_once(dirname(__FILE__) . '/Conekta/PayoutTest.php');

?>
