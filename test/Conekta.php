<?php

function setApiKey()
{
	if (isset($env) == false) {
		$env = Conekta::setApiKey('1tv5yJp3xnVZ7eK67m4h');
	}
}
function unsetApiKey()
{
	if (isset($env) == false) {
		$env = Conekta::setApiKey('');
	}
}

@include_once(dirname(__FILE__).'/simpletest/autorun.php');
require_once(dirname(__FILE__) . '/../lib/Conekta.php');
require_once(dirname(__FILE__) . '/Conekta/ChargeTest.php');
require_once(dirname(__FILE__) . '/Conekta/CustomerTest.php');
require_once(dirname(__FILE__) . '/Conekta/EventTest.php');
require_once(dirname(__FILE__) . '/Conekta/PlanTest.php');
require_once(dirname(__FILE__) . '/Conekta/ErrorTest.php');
require_once(dirname(__FILE__) . '/Conekta/PayoutTest.php');

?>
