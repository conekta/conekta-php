<?php

namespace Conekta;

class CustomerTest extends BaseTest
{
  public static $validCustomer = array(
    'email' => 'hola@hola.com',
    'name'  => 'John Constantine'
    );
  public static $invalidCustomer = array(
    'email' => 'hola@hola.com',
    'names'  => 'John Constantine'
    );
  public static $validRecurrentCustomer = array(
    'name' => 'John Constantine',
    'email' => 'john_constantine@conekta.com',
    'payment_sources' => array(array(
      'type' => 'oxxo_recurrent',
    ))
  );

  public function testSuccesfulCustomerCreate()
  {
    $this->setApiKey();
    $customer = Customer::create(self::$validCustomer);
    $this->assertTrue(strpos(get_class($customer), 'Customer') !== false);
  }

  public function testSuccessfulCustomerNewWhere()
  {
    $this->setApiKey();
    $customers = Customer::where();
    $this->assertTrue(strpos(get_class($customers), 'ConektaList') !== false);
    $this->assertTrue(strpos($customers->elements_type, 'Customer') !== false);
    $this->assertTrue(strpos(get_class($customers[0]), 'Customer') !== false);
    $this->assertTrue(strpos(get_class(end($customers)), 'Customer') !== false);
  }

  public function testSuccesfulDeleteCustomer()
  {
    $this->setApiKey();
    $customer = Customer::create(self::$validCustomer);
    $customer->delete();
    $this->assertTrue($customer->deleted == true);
  }

  public function testUnsuccesfulCustomerCreate()
  {
    $this->setApiKey();
    try {
      $customer = Customer::create(self::$invalidCustomer);
    } catch (\Exception $e) {
      $this->assertTrue(strpos($e->getMessage(),"El parametro \"name\" es requerido") !== false);
    }
  }

  public function testSuccesfulSourceCreate()
  {
    $this->setApiKey();
    $customer = Customer::create(self::$validCustomer);
    $source = $customer->createPaymentSource(array(
      'token_id' => 'tok_test_visa_4242',
      'type' => 'card'
      ));
    $this->assertTrue(strpos(get_class($source), 'PaymentSource') !== false);
    $this->assertTrue($source->isCard());
    $this->assertTrue(strpos(get_class($customer->payment_sources), 'ConektaList') !== false);
    $this->assertTrue($customer->payment_sources->total == 1);
  }

  public function testSuccessfulSourceDelete()
  {
    $this->setApiKey();
    $customer = Customer::create(self::$validCustomer);
    $firstSource = $customer->createPaymentSource(array(
      'token_id' => 'tok_test_visa_4242',
      'type' => 'card'
      ));
    $secondSource = $customer->createPaymentSource(array(
      'token_id' => 'tok_test_mastercard_4444',
      'type' => 'card'
      ));
    $customer->deletePaymentSourceById($customer->payment_sources[1]->id);
    $this->assertTrue($customer->payment_sources[1]->deleted);
  }

  public function testSuccesfulShippingContactCreate()
  {
    $this->setApiKey();
    $customer = Customer::create(self::$validCustomer);
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

  public function testCreateOfflineRecurrentReference()
  {
    $this->setApiKey();
    $customer = Customer::create(self::$validCustomer);
    $source = $customer->createOfflineRecurrentReference(array(
      'type' => 'oxxo_recurrent'
    ));
    $this->assertTrue(strpos(get_class($source), 'PaymentSource') !== false);
    $this->assertTrue(strpos(get_class($customer->payment_sources), 'ConektaList') !== false);
    $this->assertTrue($customer->payment_sources->total == 1);
    $this->assertEquals($source['type'], 'oxxo_recurrent');
    $this->assertTrue(strlen($source['reference']) == 14);
  }

   public function testCustomerWithOfflineRecurrentSourceIsCreated()
  {
    $this->setApiKey();
    $customer = Customer::create(self::$validRecurrentCustomer);
    $source = $customer->payment_sources[0];
    $this->assertTrue(strpos(get_class($source), 'PaymentSource') !== false);
    $this->assertTrue(strpos(get_class($customer->payment_sources), 'ConektaList') !== false);
    $this->assertTrue($customer->payment_sources->total == 1);
    $this->assertEquals($source['type'], 'oxxo_recurrent');
    $this->assertTrue($source->isOxxoRecurrent());
    $this->assertTrue(strlen($source['reference']) == 14);
  }
}
