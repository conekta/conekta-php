<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class CustomerTest extends TestCase
{
  function setApiKey()
  {
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
  }
  public static $validCustomer = array(
    'email' => 'hola@hola.com',
    'name'  => 'John Constantine'
    );
  public static $invalidCustomer = array(
    'email' => 'hola@hola.com',
    'names'  => 'John Constantine'
    );

  public function testSuccesfulCustomerCreate()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $this->assertTrue(strpos(get_class($customer), 'Customer') !== false);
  }

  public function testSuccessfulCustomerNewWhere()
  {
    $this->setApiKey();
    $customers = \Conekta\Customer::where();
    $this->assertTrue(strpos(get_class($customers), 'ConektaList') !== false);
    $this->assertTrue(strpos($customers->elements_type, 'Customer') !== false);
    $this->assertTrue(strpos(get_class($customers[0]), 'Customer') !== false);
    $this->assertTrue(strpos(get_class(end($customers)), 'Customer') !== false);
  }

  public function testSuccesfulDeleteCustomer()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $customer->delete();
    $this->assertTrue($customer->deleted == true);
  }

  public function testUnsuccesfulCustomerCreate()
  {
    $this->setApiKey();
    try {
      $customer = \Conekta\Customer::create(self::$invalidCustomer);
    } catch (\Conekta\ParameterValidationError $e) {
      $this->assertTrue(strpos($e->getMessage(),"El parametro \"name\" es requerido") !== false);
    }
  }

  public function testSuccesfulSourceCreate()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $source = $customer->createPaymentSource(array(
      'token_id' => 'tok_test_visa_4242',
      'type' => 'card'
      ));
    $this->assertTrue(strpos(get_class($source), 'PaymentSource') !== false);
    $this->assertTrue(strpos(get_class($customer->payment_sources), 'ConektaList') !== false);
    $this->assertTrue($customer->payment_sources->total == 1);
  }

  public function testSuccesfulShippingContactCreate()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $shippingContact = $customer->createShippingContact(array(
      'receiver' => 'John Williams',
      'phone' => '+523333350360',
      'email' => 'test@conekta.io',
      'address' => array(
        'street1' => 'Wallaaby',
        'city' => 'Sydney',
        'state' => 'P. Sherman',
        'country' => 'MX',
        'postal_code' => '78215'
        )
      )
    );
    $this->assertTrue(strpos(get_class($shippingContact), 'ShippingContact') !== false);
    $this->assertTrue(strpos(get_class($customer->shipping_contacts), 'ConektaList') !== false);
    $this->assertTrue($customer->shipping_contacts->total == 1);
  }
}
