<?php

namespace Conekta;

class ErrorHandlerTest extends BaseTest
{
    public static $validOrder = [
    'line_items' => [
      [
        'name'        => 'Box of Cohiba S1s',
        'description' => 'Imported From Mex.',
        'unit_price'  => 20000,
        'quantity'    => 1,
        'sku'         => 'cohb_s1',
        'category'    => 'food',
        'tags'        => ['food', 'mexican food']
        ]
      ],
    'currency' => 'mxn',
    'metadata' => ['test' => 'extra info']
    ];
    public static $otherParams = [
    'currency'      => 'mxn',
    'customer_info' => [
      'name'  => 'John Constantine',
      'phone' => '+5213353319758',
      'email' => 'hola@hola.com'
      ]
    ];
    public static $invalidCustomer = [
    'email' => 'hola@hola.com',
    'cards' => ['tok_test_visa_4241']
    ];

    public function unsetApiKey()
    {
        if (isset($env) == false) {
            $env = Conekta::setApiKey('');
        }
    }

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
            $customer = Customer::create(['cards' => ['tok_test_visa_4241']]);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'NoConnectionError') == true);
        }
        Conekta::$apiBase = $apiUrl;
    }

    public function testParameterValidationError()
    {
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
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'AuthenticationError') == true);
        }
        $this->setApiKey();
    }
    public function testUnknowApiRequest()
    {
        $this->setApiKey();
        $valid_visa_card = [
      'payment_method' => [
        'type'     => 'card',
        'token_id' => 'tok_test_insufficient_funds']
      ];

        try {
            $orderParams = array_merge(self::$validOrder, self::$otherParams);
            $order = Order::create($orderParams);
            $charge = $order->createCharge($valid_visa_card);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ProcessingError') == true);
        }
    }
}
