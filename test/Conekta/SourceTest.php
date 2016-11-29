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
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $sources = $customer->sources[0];
        $sources->delete();
        $this->assertTrue($sources->deleted == true);
    }

    public function testSuccesfulUpdateSources()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $sources = $customer->sources[0];
        $sources->update(array('exp_month' => '11'));
        $this->assertTrue($sources->exp_month == '11');
    }
/* PENDING IN ORDER TO CHECK INTERNAL ERROR HANDLER
    public function testUnsuccesfulUpdateSources(){
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $sources = $customer->sources[0];
        try{
            $sources->update(array('token_id' => 'tok_test_visa_4241'));
        }catch (Exception $e) {
            //strpos($e, 'token_id is immutable.');
            //echo $e->getMessage();
            echo $e;
            $this->assertTrue(strpos($e->getMessage(), 'token_id is immutable.') == true);
        }
    }
*/
}