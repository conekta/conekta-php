<?php

class TokenTest extends UnitTestCase
{
    public function testSuccesfulGetToken()
    {
        setApiKey();
        $token = \Conekta\Plan::find('tok_test_visa_4242');
        $this->assertTrue(strpos(get_class($token), 'Token') !== false);
    }
}
