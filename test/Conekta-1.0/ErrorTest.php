<?php

class ErrorTest extends UnitTestCase
{
    public function testNoIdError()
    {
        setApiKey();
        setApiVersion('1.0.0');
        try {
            $charge = \Conekta\Charge::find('0');
        } catch (Exception $e) {
            $this->assertTrue(strpos($e->getMessage(), 'Could not get the id of Resource instance.') !== false);
        }
    }

    public function testNoConnectionError()
    {
        setApiVersion('1.0.0');
        $apiUrl = \Conekta\Conekta::$apiBase;
        \Conekta\Conekta::$apiBase = 'http://localhost:3001';
        try {
            $customer = \Conekta\Customer::create(array('cards' => array('tok_test_visa_4242')));
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'NoConnectionError') !== false);
        }
        \Conekta\Conekta::$apiBase = $apiUrl;
    }

    public function testApiError()
    {
        setApiKey();
        setApiVersion('1.0.0');
        try {
            $customer = \Conekta\Customer::create(array(
                'cards' => array('tok_test_visa_4243'),
                'name' => 'Test Name',
                'email' => 'test@conekta.io'
            ));
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') !== false);
        }
    }

    public function testAuthenticationError()
    {
        unsetApiKey();
        setApiVersion('1.0.0');
        try {
            $customer = \Conekta\Customer::create(array('cards' => array('tok_test_visa_4242')));
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'AuthenticationError') !== false);
        }
        setApiKey();
    }

    public function testParameterValidationError()
    {
        setApiKey();
        setApiVersion('1.0.0');
        try {
            $plan = \Conekta\Plan::create(array('id' => 'gold-plan'));
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') !== false);
        }
    }

    public function testProcessingError()
    {
		setApiVersion('1.0.0');
        $charges = \Conekta\Charge::where();
        foreach ($charges as $charge) {
            if (strpos($charge->status, 'pre_authorized') !== false) {
                $ok = true;
                continue;
            }
        }
        try {
            if (isset($ok)) {
                $charge->capture();
            }
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ProcessingError') !== false);
        }
    }

    public function testResourceNotFoundError()
    {
        setApiKey();
        setApiVersion('1.0.0');
        try {
            $charge = \Conekta\Charge::find('1');
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ResourceNotFoundError') !== false);
        }
    }
}
