<?php

namespace Conekta;

class TokenTest extends BaseTest
{
  public static $validTokenWithCheckout = array(
      'checkout'    => array(
        'returns_control_on' => 'Token'
      ),
    );

  public function testSuccesfulCreateTokenWithCheckout()
  {
    $this->setApiKey();
    $token = Token::create(self::$validTokenWithCheckout);
    $this->assertTrue(strpos(get_class($token), 'Token') !== false);
    $this->assertTrue(strpos(get_class($token->checkout), 'Checkout') !== false);

    $this->assertEquals(array("card"), (array) $token->checkout->allowed_payment_methods);
    $this->assertEquals(false, $token->checkout->monthly_installments_enabled);
    $this->assertEquals(array(), (array) $token->checkout->monthly_installments_options);
    $this->assertTrue( strlen($token->checkout->id) == 36);
    $this->assertEquals('checkout', $token->checkout->object);
    $this->assertEquals('Integration', $token->checkout->type);
  }

}
