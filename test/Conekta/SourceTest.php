<?php

class SourceTest extends UnitTestCase
{
    public static $valid_customer =
        array('email' => 'hola@hola.com',
            'name' => 'John Constantine',
            'sources' => array(array(
                'token_id' => 'tok_test_visa_4242',
                'type' => 'card'
            ))
        );

    public function testSuccesfulDeleteSources()
    {
        setApiVersion('1.1.0');
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        var_dump($customer->sources);
        $source = $customer->sources['data'][0];
        $source->delete();
        $this->assertTrue($source->deleted == true);
    }

    public function testSuccesfulUpdateSources()
    {
        setApiVersion('1.1.0');
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $source = $customer->sources[0];
        $source->update(array('exp_month' => '11'));
        $this->assertTrue($source->exp_month == '11');
    }

    public function testUnsuccesfulUpdateSources(){
        setApiVersion('1.1.0');
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $source = $customer->sources[0];
        try{
            $source->update(array('token_id' => 'tok_test_visa_4241'));
        }catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }
}