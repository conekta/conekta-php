<?php

class ErrorTest extends UnitTestCase
{
    public function testNoIdError()
    {
        setApiKey();
        setApiVersion('1.1.0');
        try {
            $customer = \Conekta\Customer::find('0');
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }

    public function testNoConnectionError()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $apiUrl = \Conekta\Conekta::$apiBase;
        \Conekta\Conekta::$apiBase = 'http://localhost:3001';
        try {
            $customer = \Conekta\Customer::create(array('cards' => array('tok_test_visa_4242')));
        } catch (Exception $e) {
            echo "Printing class\n";
            var_dump(get_class($e));
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
        \Conekta\Conekta::$apiBase = $apiUrl;
    }
}