<?php

class CustomerTest extends UnitTestCase
{
    public static $valid_customer = array(
        'email' => 'hola@hola.com',
        'name'  => 'John Constantine'
    );

    public function testSuccesfulCustomerCreate()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $this->assertTrue(strpos(get_class($customer), 'Customer') !== false);
    }

    public function testSuccessfulCustomerNewWhere()
    {
        setApiKey();
        $customers = \Conekta\Customer::where();
        $this->assertTrue(strpos(get_class($customers), 'ConektaList') !== false);
        $this->assertTrue(strpos($customers->elements_type, 'Customer') !== false);
        $this->assertTrue(strpos(get_class($customers[0]), 'Customer') !== false);
        $this->assertTrue(strpos(get_class(end($customers)), 'Customer') !== false);
    }

    public function testSuccesfulDeleteCustomer()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $customer->delete();
        $this->assertTrue($customer->deleted == true);
    }

    public function testUnsuccesfulCustomerCreate()
    {
        setApiKey();
        try {
            $customer = \Conekta\Customer::create(self::$valid_customer);
        } catch (Exception $e) {
            $this->assertTrue(strpos($e->getMessage(), 'Object tok_test_visa_4241 could not be found.') !== false);
        }
    }

    public function testSuccesfulSourceCreate()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
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
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $shipping_contact = $customer->createShippingContact(array(
            'receiver' => 'John Williams',
            'phone' => '+523333350360',
            'email' => 'test@conekta.io',
            'address' => array(
                'street1' => 'Wallaaby',
                'city' => 'Sydney',
                'state' => 'P. Sherman',
                'country' => 'MX',
                'zip' => '78215'
            )
        ));
        $this->assertTrue(strpos(get_class($shipping_contact), 'ShippingContact') !== false);
        $this->assertTrue(strpos(get_class($customer->shipping_contacts), 'ConektaList') !== false);
        $this->assertTrue($customer->shipping_contacts->total == 1);
    }

    public function testSuccesfulFiscalEntityCreate()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $fiscal_entity = $customer->createFiscalEntity(array(
            'tax_id' => 'AMGH851205MN1',
            'company_name' => 'Test SA de CV',
            'email' => 'test@conekta.io',
            'phone' => '+5213353319758',
            'address' => array(
                'street1' => '250 Alexis St',
                'internal_number' => 19,
                'external_number' => 10,
                'city' => 'Red Deer',
                'state' => 'Alberta',
                'country' => 'MX',
                'zip' => '78216'
            )
        ));

        $this->assertTrue(strpos(get_class($fiscal_entity), 'FiscalEntity') !== false);
        $this->assertTrue(strpos(get_class($customer->fiscal_entities), 'ConektaList') !== false);
        $this->assertTrue($customer->fiscal_entities->total == 1);
    }
}
