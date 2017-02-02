<?php

class ErrorListTest extends UnitTestCase
{

    public static $invalid_customer =
        array('email' => 'hola@hola.com',
            'cards' => array('tok_test_visa_4241')
        );

    public function testNoIdError()
    {
        setApiKey();
        try {
            $customer = \Conekta\Customer::find('0');
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }

    public function testNoConnectionError()
    {
        setApiKey();
        $apiUrl = \Conekta\Conekta::$apiBase;
        \Conekta\Conekta::$apiBase = 'http://localhost:3001';
        try {
            $customer = \Conekta\Customer::create(array('cards' => array('tok_test_visa_4241')));
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
        \Conekta\Conekta::$apiBase = $apiUrl;
    }

    public function testApiError(){
        setApiKey();
        try {
            $customer = \Conekta\Customer::create(self::$invalid_customer);
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }

    public function testResourceNotFoundError()
    {
        setApiKey();
        try {
            $customer = \Conekta\Customer::find('1');
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }
}