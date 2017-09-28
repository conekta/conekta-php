<?php

namespace Conekta;

class SourceTest extends BaseTest
{
  public static $validCustomer =
  array('email' => 'hola@hola.com',
    'name' => 'John Constantine',
    'payment_sources' => array(array(
      'token_id' => 'tok_test_visa_4242',
      'type' => 'card'
      ))
    );

  public function testSuccesfulDeleteSources()
  {
    $this->setApiKey();
    $customer = Customer::create(self::$validCustomer);
    $paymentSource = $customer->payment_sources[0];
    $paymentSource->delete();
    $this->assertTrue($paymentSource->deleted == true);
  }

  public function testSuccesfulUpdateSources()
  {
    $this->setApiKey();
    $customer = Customer::create(self::$validCustomer);
    $paymentSource = $customer->payment_sources[0];
    $paymentSource->update(array('exp_month' => '11'));
    $this->assertTrue($paymentSource->exp_month == '11');
  }

  public function testUnsuccesfulUpdateSources(){
    $this->setApiKey();
    $customer = Customer::create(self::$validCustomer);
    $paymentSource = $customer->payment_sources[0];
    try{
      $paymentSource->update(array('token_id' => 'tok_test_visa_4241'));
    }catch (\Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
    }
  }
}