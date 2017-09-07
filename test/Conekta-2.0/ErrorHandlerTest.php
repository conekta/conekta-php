<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';
require_once dirname(__FILE__).'/../BaseTest.php';

class ErrorHandlerTest extends TestCase
{   

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
  public static $invalidCustomer = array(
    'email' => 'hola@hola.com',
    'cards' => array('tok_test_visa_4241')
    );

  function unsetApiKey()
  {
    if (isset($env) == false) {
      $env = \Conekta\Conekta::setApiKey('');
    }
  }

  public function testNoIdError()
  {
    BaseTest::setApiKey();
    try {
      $customer = \Conekta\Customer::find('0');
    } catch (Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
    }
  }

  public function testNoConnectionError()
  {
    BaseTest::setApiKey();
    $apiUrl = \Conekta\Conekta::$apiBase;
    \Conekta\Conekta::$apiBase = 'http://localhost:3001';
    try {
      $customer = \Conekta\Customer::create(array('cards' => array('tok_test_visa_4241')));
    } catch (Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'NoConnectionError') == true);
    }
    \Conekta\Conekta::$apiBase = $apiUrl;
  }

  public function testParameterValidationError(){
    BaseTest::setApiKey();
    try {
      $customer = \Conekta\Customer::create(self::$invalidCustomer);
    } catch (Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
    }
  }

  public function testResourceNotFoundError()
  {
    BaseTest::setApiKey();
    try {
      $customer = \Conekta\Customer::find('2');
    } catch (Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ResourceNotFoundError') == true);
    }
  }
  public function testAuthenticationError()
  {
    $this->unsetApiKey();
    try{
      $customer = \Conekta\Customer::create();
    }catch(Exception $e){
      $this->assertTrue(strpos(get_class($e), 'AuthenticationError') == true);
    }
    BaseTest::setApiKey();
  }
  public function testUnknowApiRequest()
  {
    BaseTest::setApiKey();
    $valid_visa_card =array(
      'payment_method' => array(
        'type' => 'card',
        'token_id' => 'tok_test_insufficient_funds')
      );

    try{
      $orderParams = array_merge(self::$validOrder, self::$otherParams);
      $order  = \Conekta\Order::create($orderParams);
      $charge = $order->createCharge($valid_visa_card);
    }catch(Exception $e){
      $this->assertTrue(strpos(get_class($e), 'ProcessingError') == true);
    }
  }

}