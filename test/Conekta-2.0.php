<?php

// Set Api key for testing
function setApiKey()
{
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
        $apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
}
function unsetApiKey()
{
    if (isset($env) == false) {
        $env = \Conekta\Conekta::setApiKey('');
    }
}
function setApiVersion($version)
{
    \Conekta\Conekta::setApiVersion($version);
}

function setPlugin($plugin){
    \Conekta\Conekta::setPlugin($plugin);
}

function setEnvLocale($locale){
    \Conekta\Conekta::setLocale($locale);
}

// Load test suite via composer or manually
$test_suite = @include_once dirname(__FILE__).'/simpletest/autorun.php';

if (!$test_suite) {
    $test_suite = @include_once dirname(__FILE__).'/../vendor/simpletest/simpletest/autorun.php';
}

if (!$test_suite) {
    echo 'Test cases depend on SimpleTest.'.
            'Download it at <http://www.simpletest.org/>, and either install it '.
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
require_once dirname(__FILE__).'/../lib/Conekta.php';

// Include tests

require_once dirname(__FILE__).'/Conekta-2.0/ChargeTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/CustomerTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/WebhookTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/OrderTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/SourceTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/TaxLineTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/ConektaListTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/ShippingContactTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/ShippingLineTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/LineItemTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/DiscountLineTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/ErrorListTest.php';
require_once dirname(__FILE__).'/Conekta-2.0/ConektaTest.php';
