<?php

function authorizeFromEnv()
{
  Conekta::setApiKey('1tv5yJp3xnVZ7eK67m4h');
}

@include_once(dirname(__FILE__).'/simpletest/autorun.php');
require_once(dirname(__FILE__) . '/../lib/Conekta.php');
require_once(dirname(__FILE__) . '/Conekta/ChargeTest.php');

?>
