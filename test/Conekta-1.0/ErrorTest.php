<?php

namespace Conekta;

class ErrorTest extends BaseTest
{   
  function unsetApiKey()
  {
    if (isset($env) == false) {
      $env = Conekta::setApiKey('');
    }
  }
  public static $validOrder = array(
    'line_items' => array(
      array(
        'name' => 'Box of Cohiba S1s',
        'description' => 'Imported From Mex.',
        'unit_price' => 20000,
        'quantity' => 1,
        'sku' => 'cohb_s1',
        'category' => 'food',
        'tags' => array('food', 'mexican food')
        )
      ),
    'currency'    => 'mxn',
    'metadata'    => array('test' => 'extra info')
    );
  public static $otherParams = array(
    'currency' => 'mxn',
    'customer_info' => array(
      'name' => 'John Constantine',
      'phone' => '+5213353319758',
      'email' => 'hola@hola.com'
      )
    );
  public static $invalidCustomer =
  array('email' => 'hola@hola.com',
    'cards' => array('tok_test_visa_4241')
    );

  public function testNoIdError()
  {
    $this->setApiKey();
    try {
      $customer = Customer::find('0');
    } catch (\Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
    }
  }

  public function testNoConnectionError()
  {
    $this->setApiKey();
    $apiUrl = Conekta::$apiBase;
    Conekta::$apiBase = 'http://localhost:3001';
    try {
      $customer = Customer::create(array('cards' => array('tok_test_visa_4241')));
    } catch (\Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'NoConnectionError') == true);
    }
    Conekta::$apiBase = $apiUrl;
  }

  public function testParameterValidationError(){
    $this->setApiKey();
    try {
      $customer = Customer::create(self::$invalidCustomer);
    } catch (\Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
    }
  }

  public function testResourceNotFoundError()
  {
    $this->setApiKey();
    try {
      $customer = Customer::find('2');
    } catch (\Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ResourceNotFoundError') == true);
    }
  }
  public function testAuthenticationError()
  {
    $this->unsetApiKey();
    try {
      $customer = Customer::create();
    } catch (\Exception $e){
      $this->assertTrue(strpos(get_class($e), 'AuthenticationError') == true);
    }
    $this->setApiKey();
  }
  public function testUnknowApiRequest()
  {
    $this->setApiKey();
    $validVisaCard =array(
      'payment_method' => array(
        'type' => 'card',
        'token_id' => 'tok_test_insufficient_funds')
      );

    try {
      $orderParams = array_merge(self::$validOrder, self::$otherParams);
      $order  = Order::create($orderParams);
      $charge = $order->createCharge($validVisaCard);
    } catch (\Exception $e){
      $this->assertTrue(strpos(get_class($e), 'ResourceNotFoundError') == true);
    }
  }
}