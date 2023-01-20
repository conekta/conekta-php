<?php

namespace Conekta;

class OrderTest extends BaseTest
{
    public static $validOrder
  = [
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

    public static $validOrderWithCheckout
    = [
      'line_items' => [
        [
          'name'        => 'Box of Cohiba S1s',
          'description' => 'Imported From Mex.',
          'unit_price'  => 120000,
          'quantity'    => 1,
          'sku'         => 'cohbs1',
          'category'    => 'food',
          'tags'        => ['food', 'mexican food']
        ]
      ],
      'checkout' => [
        'multifactor_authentication'   => false,
        'allowed_payment_methods'      => ['cash', 'card', 'bank_transfer'],
        'monthly_installments_enabled' => true,
        'monthly_installments_options' => [3, 6, 9, 12]
      ],
      'customer_info' => [
        'name'  => 'Juan Perez',
        'email' => 'juan.perez@mail.com',
        'phone' => '5566982090'
      ],
      'currency' => 'mxn',
      'metadata' => ['test' => 'extra info']
    ];

    public static $validOrderWithCheckoutRedirection
    = [
      'line_items' => [
        [
          'name'        => 'Box of Cohiba S1s',
          'description' => 'Imported From Mex.',
          'unit_price'  => 120000,
          'quantity'    => 1,
          'sku'         => 'cohbs1',
          'category'    => 'food',
          'tags'        => ['food', 'mexican food']
        ]
      ],
      'checkout' => [
        'allowed_payment_methods'      => ['cash', 'card', 'bank_transfer'],
        'monthly_installments_enabled' => false,
        'monthly_installments_options' => [],
        'type'                         => 'HostedPayment',
        'success_url'                  => 'https://www.google.com/search?q=Success',
        'failure_url'                  => 'https://www.google.com/search?q=Failure',
        'is_redirect_on_failure'       => false
      ],
      'customer_info' => [
        'name'  => 'Juan Perez',
        'email' => 'juan.perez@mail.com',
        'phone' => '5566982090'
      ],
      'currency' => 'mxn',
      'metadata' => ['test' => 'extra info']
    ];

    public static $validRefund = [
    'amount'   => 20000,
    'reason'   => 'requested_by_client',
    'currency' => 'MXN',
    ];

    public function testSuccesfulCreateOrder()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $this->assertTrue(strpos($order->metadata['test'], 'extra info') !== false);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    public function testSuccesfulCreateOrderWithCharges()
    {
        $charges = [
      'charges' => [
        [
          'payment_method' => [
            'type'       => 'oxxo_cash',
            'expires_at' => strtotime(date('Y-m-d H:i:s')) + '36000'
            ],
          'amount' => 20000
          ]
        ],
      'currency'      => 'mxn',
      'customer_info' => [
        'name'  => 'John Constantine',
        'phone' => '+5213353319758',
        'email' => 'hola@hola.com'
        ]
      ];
        $this->setApiKey();
        $order = Order::create(array_merge(self::$validOrder, $charges));
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
        $this->assertTrue(count($order->charges) > 0);
    }

    public function testSuccesfulCharge()
    {
        $other_params
    = [
      'currency'      => 'mxn',
      'customer_info' => [
        'name'  => 'John Constantine',
        'phone' => '+5213353319758',
        'email' => 'hola@hola.com'
        ]
      ];
        $this->setApiKey();
        $order = Order::create(array_merge(self::$validOrder, $other_params));
        $charge_params = [
      'payment_method' => ['type' => 'oxxo_cash'],
      'amount'         => 20000
      ];
        $charge = $order->createCharge($charge_params);
        $this->assertTrue(strpos(get_class($charge), 'Charge') !== false);
        $this->assertTrue(strpos(get_class($order->charges), 'ConektaList') !== false);
        $this->assertTrue($order->charges->total == 1);
    }

    public function testSuccesfulCreateOrderWithCheckout()
    {
        $this->setApiKey();
        if (Conekta::$apiBase == 'https://api.conekta.io') {
            $this->markTestSkipped('This test should be run in staging.');
        }
        self::$validOrderWithCheckout['checkout']['expires_at'] = static::getExpiredAt();
        $order = Order::create(self::$validOrderWithCheckout);
        $this->assertTrue(strpos($order->metadata['test'], 'extra info') !== false);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
        $this->assertTrue(strpos(get_class($order->checkout), 'Checkout') !== false);

        $this->assertEquals(false, $order->checkout->multifactor_authentication);
        $this->assertEquals(['cash', 'card', 'bank_transfer'], (array) $order->checkout->allowed_payment_methods);
        $this->assertEquals(true, $order->checkout->monthly_installments_enabled);
        $this->assertEquals([3, 6, 9, 12], (array) $order->checkout->monthly_installments_options);
        $this->assertTrue(strlen($order->checkout->id) == 36);
        $this->assertEquals('checkout', $order->checkout->object);
        $this->assertEquals('Integration', $order->checkout->type);
    }

    public function testSuccesfulCreateOrderWithCheckoutRedirection()
    {
        $this->setApiKey();
        if (Conekta::$apiBase == 'https://api.conekta.io') {
            $this->markTestSkipped('This test should be run in staging.');
        }
        self::$validOrderWithCheckoutRedirection['checkout']['expires_at'] = static::getExpiredAt();
        $order = Order::create(self::$validOrderWithCheckoutRedirection);
        $this->assertTrue(strpos($order->metadata['test'], 'extra info') !== false);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
        $this->assertTrue(strpos(get_class($order->checkout), 'Checkout') !== false);

        $this->assertEquals(false, $order->checkout->multifactor_authentication);
        $this->assertEquals(['cash', 'card', 'bank_transfer'], (array) $order->checkout->allowed_payment_methods);
        $this->assertEquals(false, $order->checkout->monthly_installments_enabled);
        $this->assertEquals([], (array) $order->checkout->monthly_installments_options);
        $this->assertTrue(strlen($order->checkout->id) == 36);
        $this->assertEquals('checkout', $order->checkout->object);
        $this->assertEquals('HostedPayment', $order->checkout->type);
        $this->assertEquals(false, $order->checkout->is_redirect_on_failure);
        $this->assertStringStartsWith('https://pay.conektame.io/checkout/', $order->checkout->url);
    }

    #Update an order
    public function testSuccesfulOrderUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);

        $updated_parameters = [
      'line_items' => [
        [
          'name'        => 'Box of chocolates',
          'description' => 'Imported From Uruguay.',
          'unit_price'  => 30000,
          'quantity'    => 2,
          'sku'         => 'choc_s3',
          'category'    => 'expendables',
          'tags'        => ['Chocolate', 'Sudamerican chocolates']
          ]
        ],
      'currency' => 'USD'
      ];

        $order->update($updated_parameters);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    public function testUnsuccessfulOrderUpdate()
    {
        $charges = [
      [
        'payment_method' => [
          'type' => 'oxxo_cash'
          ],
        'amount' => 10
        ]
      ];

        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        try {
            $order->update(['charges' => $charges]);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
        }
    }

    public function testSuccesfulOrderFind()
    {
        $this->setApiKey();
        $id = Order::create(self::$validOrder)->id;
        $order = Order::find($id);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    public function testSuccesfulOrderWhere()
    {
        $this->setApiKey();
        $orders = Order::where();
        $orderArray = (array) $orders;
        $this->assertTrue(str_contains(get_class($orders), 'ConektaList'));
        $this->assertTrue(str_contains($orders->elements_type, 'Order'));
        $this->assertTrue(str_contains(get_class($orders[0]), 'Order'));
        $this->assertTrue(str_contains(get_class(end($orderArray)), 'Order'));
    }

    public function testSuccessfulLineItem()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);

        $line_item = $order->createLineItem([
      'name'        => 'Box of Cohiba S1s',
      'description' => 'Imported From Mex.',
      'unit_price'  => 20000,
      'quantity'    => 1,
      'tags'        => ['food', 'mexican food']
      ]);

        $this->assertTrue(strpos(get_class($line_item), 'LineItem') !== false);
        $this->assertTrue(strpos(get_class($order->line_items), 'ConektaList') !== false);
        $this->assertTrue($order->line_items->total == 2);
    }

    public function testSuccessfulTaxLine()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);

        $taxLine = $order->createTaxLine([
      'description' => 'IVA',
      'amount'      => 60
      ]);

        $taxLine = $order->createTaxLine([
      'description' => 'ISR',
      'amount'      => 6
      ]);

        $this->assertTrue(strpos(get_class($taxLine), 'TaxLine') !== false);
        $this->assertTrue(strpos(get_class($order->tax_lines), 'ConektaList') !== false);
        $this->assertTrue($order->tax_lines->total == 2);
    }

    public function testSuccessfulShippingLine()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);

        $shippingLine = $order->createShippingLine([
      'description'     => 'Free Shipping',
      'amount'          => 0,
      'tracking_number' => 'TRACK123',
      'carrier'         => 'USPS',
      'method'          => 'Train'
      ]);

        $this->assertTrue(strpos(get_class($shippingLine), 'ShippingLine') !== false);
        $this->assertTrue(strpos(get_class($order->shipping_lines), 'ConektaList') !== false);
        $this->assertTrue($order->shipping_lines->total == 1);
    }

    public function testSuccessfulDiscountLine()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $discountLine = $order->createDiscountLine([
      'code'   => 'Cupon de descuento',
      'amount' => 10,
      'type'   => 'loyalty'
      ]);
        $this->assertTrue(strpos(get_class($discountLine), 'DiscountLine') !== false);
        $this->assertTrue(strpos(get_class($order->discount_lines), 'ConektaList') !== false);
        $this->assertTrue($order->discount_lines->total == 1);
    }

    public function testSuccessfulRefund()
    {
        $charges = [
      'charges' => [
        [
          'payment_method' => [
            'type'     => 'card',
            'token_id' => 'tok_test_visa_4242'
            ],
          'amount' => 20000
          ]
        ],
      'currency'      => 'mxn',
      'customer_info' => [
        'name'  => 'John Constantine',
        'phone' => '+5213353319758',
        'email' => 'hola@hola.com'
        ]
      ];
        $this->setApiKey();
        $order = Order::create(array_merge(self::$validOrder, $charges));
        $order->refund(array_merge(self::$validRefund, ['order_id' => $order->id]));
        $refundedOrder = Order::find($order->id);

        $this->assertTrue($refundedOrder->payment_status == 'refunded');
    }

    public function testSuccessfulCapture()
    {
        $charges
    = [
      'pre_authorize' => true,
      'charges'       => [
        [
          'payment_method' => [
            'type'     => 'card',
            'token_id' => 'tok_test_visa_4242'
            ],
          'amount' => 20000
          ]
        ],
      'currency'      => 'mxn',
      'customer_info' => [
        'name'  => 'John Constantine',
        'phone' => '+5213353319758',
        'email' => 'hola@hola.com'
        ]
      ];
        $this->setApiKey();
        $order = Order::create(array_merge(self::$validOrder, $charges));
        $this->assertTrue($order->payment_status == 'pre_authorized');
        $this->assertTrue($order->charges[0]->status == 'pre_authorized');

        $order->capture();

        $this->assertTrue($order->payment_status == 'paid');
        $this->assertTrue($order->charges[0]->status == 'paid');
    }

    public function testVoid()
    {
        $charges
    = [
      'pre_authorize' => true,
      'charges'       => [
        [
          'payment_method' => [
            'type'     => 'card',
            'token_id' => 'tok_test_visa_4242'
            ],
          'amount' => 20000
          ]
        ],
      'currency'      => 'mxn',
      'customer_info' => [
        'name'  => 'John Constantine',
        'phone' => '+5213353319758',
        'email' => 'hola@hola.com'
        ]
      ];
        $validOrder['PreAuth'] = true;
        $this->setApiKey();
        $order = Order::create(array_merge(self::$validOrder, $charges));
        $res = $order->void([$order['id']]);
        $this->assertTrue($res['payment_status'] == 'voided');
    }

    public static function getExpiredAt()
    {
        $datetime = new \Datetime();
        $datetime->add(new \DateInterval('P3D'));
        return $datetime->format('U');
    }
}
