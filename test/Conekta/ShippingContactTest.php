<?php

class ShippingContentTest extends UnitTestCase
{
    public static $valid_customer =
        array('email' => 'hola@hola.com',
              'name' => 'John Constantine',
              'shipping_contacts' => array(
                  array(
                      'email' => 'thomas.logan@xmen.org',
                      'address' => array(
                          'street1' => '250 Alexis St',
                          'city' => 'Red Deer',
                          'state' => 'Alberta',
                          'country' => 'CA',
                          'zip' => 'T4N 0B8'
                      )
                  ),
                  array(
                      'email' => 'rogue@xmen.org',
                      'address' => array(
                          'street1' => '250 Alexis St',
                          'city' => 'Red Deer',
                          'state' => 'Alberta',
                          'country' => 'CA',
                          'zip' => 'T4N 0B8'
                      )
                  )
              )
            );

    public function testSuccessfulShippingContactDelete()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $shipping_contact = $customer->shipping_contacts[0];
        $shipping_contact->delete();

        $this->assertTrue($shipping_contact->deleted == true);
    }

    public function testSuccessfulShippingContactUpdate()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $shipping_contact = $customer->shipping_contacts[0];
        $shipping_contact->update(array('email' => 'hola@hola.com'));

        $this->assertTrue($shipping_contact->email == 'hola@hola.com');
    }
}