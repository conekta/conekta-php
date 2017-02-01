<?php

class ShippingContactTest extends UnitTestCase
{
    public static $valid_customer =
        array('email' => 'hola@hola.com',
              'name' => 'John Constantine',
              'shipping_contacts' => array(
                  array(
                      'receiver' => 'Jack Bauer',
                      'phone' => '+5213353319758',
                      'email' => 'thomas.logan@xmen.org',
                      'address' => array(
                          'street1' => '250 Alexis St',
                          'city' => 'Red Deer',
                          'state' => 'Alberta',
                          'country' => 'CA',
                          'postal_code' => 'T4N 0B8'
                      )
                  ),
                  array(
                      'receiver' => 'John Williams',
                      'phone' => '+5213353319758',
                      'email' => 'rogue@xmen.org',
                      'address' => array(
                          'street1' => '250 Alexis St',
                          'city' => 'Red Deer',
                          'state' => 'Alberta',
                          'country' => 'CA',
                          'postal_code' => 'T4N 0B8'
                      )
                  )
              )
            );

    public function testSuccessfulShippingContactDelete()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $shipping_contact = $customer->shipping_contacts[0];
        $shipping_contact->delete();

        $this->assertTrue($shipping_contact->deleted == true);
    }

    public function testSuccessfulShippingContactUpdate()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $shipping_contact = $customer->shipping_contacts[0];
        $shipping_contact->update(array('receiver' => 'Tony Almeida'));
        $this->assertTrue($shipping_contact->receiver == 'Tony Almeida');
    }

    public function testUnsuccessfulShippingContactUpdate()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $shipping_contact = $customer->shipping_contacts[0];
        try{
            $shipping_contact->update(array('email' => 123));
        }catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }
}