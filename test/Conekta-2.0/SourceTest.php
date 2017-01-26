<?php

class SourceTest extends UnitTestCase
{
    public static $valid_customer =
        array('email' => 'hola@hola.com',
            'name' => 'John Constantine',
            'payment_sources' => array(array(
                'token_id' => 'tok_test_visa_4242',
                'type' => 'card'
            ))
        );

    public function testSuccesfulDeleteSources()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $payment_source = $customer->payment_sources[0];

        $payment_source->delete();

        $this->assertTrue($payment_source->deleted == true);
    }

    public function testSuccesfulUpdateSources()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $payment_source = $customer->payment_sources[0];
        $payment_source->update(array('exp_month' => '11'));
        $this->assertTrue($payment_source->exp_month == '11');
    }

    public function testUnsuccesfulUpdateSources(){
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $payment_source = $customer->payment_sources[0];
        try{
            $payment_source->update(array('token_id' => 'tok_test_visa_4241'));
        }catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }
}