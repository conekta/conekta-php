<?php

class CustomerTest extends UnitTestCase
{
    public function testSuccesfulDeleteSources()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(
            array('email' => 'hola@hola.com',
                'name' => 'John Constantine',
                'sources' => array(array(
                    'token_id' => 'tok_test_visa_4242',
                    'type' => 'card'
                ))
            )
        );
        $sources = $customer->sources[0];
        $sources->delete();

        $this->assertTrue(strpos(get_class($customer), 'Customer') !== false);
    }
}