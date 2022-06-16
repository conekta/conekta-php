<?php

namespace Conekta;

class ShippingContactTest extends BaseTest
{
    public static $validCustomer = [
    'email'             => 'hola@hola.com',
    'name'              => 'John Constantine',
    'shipping_contacts' => [
      [
        'receiver' => 'Jack Bauer',
        'phone'    => '+5213353319758',
        'email'    => 'thomas.logan@xmen.org',
        'address'  => [
          'street1'     => '250 Alexis St',
          'city'        => 'Red Deer',
          'state'       => 'Alberta',
          'country'     => 'CA',
          'postal_code' => 'T4N 0B8'
        ]
      ],
      [
        'receiver' => 'John Williams',
        'phone'    => '+5213353319758',
        'email'    => 'rogue@xmen.org',
        'address'  => [
          'street1'     => '250 Alexis St',
          'city'        => 'Red Deer',
          'state'       => 'Alberta',
          'country'     => 'CA',
          'postal_code' => 'T4N 0B8'
        ]
      ]
    ]
  ];

    public function testSuccessfulShippingContactDelete()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $shippingContact = $customer->shipping_contacts[0];
        $shippingContact->delete();
        $this->assertTrue($shippingContact->deleted == true);
    }

    public function testSuccessfulShippingContactUpdate()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $shippingContact = $customer->shipping_contacts[0];
        $shippingContact->update(['receiver' => 'Tony Almeida']);
        $this->assertTrue($shippingContact->receiver == 'Tony Almeida');
    }

    public function testUnsuccessfulShippingContactUpdate()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $shippingContact = $customer->shipping_contacts[0];
        try {
            $shippingContact->update(['phone' => '']);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
        }
    }
}
