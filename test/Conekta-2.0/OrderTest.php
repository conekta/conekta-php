<?php

class OrderTest extends UnitTestCase
{
    public static $valid_order =
        array(
            'line_items'=> array(
                array(
                    'name'=> 'Box of Cohiba S1s',
                    'description'=> 'Imported From Mex.',
                    'unit_price'=> 20000,
                    'quantity'=> 1,
                    'sku'=> 'cohb_s1',
                    'category'=> 'food',
                    'type' => 'physical',
                    'tags' => array('food', 'mexican food')
                )
            ),
            'currency'    => 'mxn',
            'metadata'    => array('test' => 'extra info')
        );

    public static $valid_refund = array(
        'amount' => 20000,
        'reason' => 'requested_by_client',
        'currency' => 'MXN',
    );

    public function testSuccesfulCreateOrder()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);
        $this->assertTrue(strpos($order->metadata["test"], 'extra info') !== false);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);

    }

    public function testSuccesfulCreateOrderWithCharges()
    {
        $charges =
            array(
                'charges' => array(
                    array(
                        'payment_method' => array(
                            'type' => 'oxxo_cash',
                            'expires_at' => strtotime(date("Y-m-d H:i:s")) + "36000"
                        ),
                        'amount' => 20000
                    )
                ),
                'currency'    => 'mxn',
                'customer_info' => array(
                    'name' => 'John Constantine',
                    'phone' => '+5213353319758',
                    'email' => 'hola@hola.com'
                )
            );
        setApiKey();
        $order = \Conekta\Order::create(array_merge(self::$valid_order, $charges));
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
        $this->assertTrue(count($order->charges) > 0);
    }

    public function testSuccesfulCharge()
    {
        $other_params =
            array(
                'currency'    => 'mxn',
                'customer_info' => array(
                    'name' => 'John Constantine',
                    'phone' => '+5213353319758',
                    'email' => 'hola@hola.com'
                )
            );
        setApiKey();
        $order = \Conekta\Order::create(array_merge(self::$valid_order, $other_params));
        $charge_params = array(
            'payment_method' => array('type' => 'oxxo_cash'),
            'amount' => 20000
        );
        $charge = $order->createCharge($charge_params);

        $this->assertTrue(strpos(get_class($charge), 'Charge') !== false);
        $this->assertTrue(strpos(get_class($order->charges), 'ConektaList') !== false);
        $this->assertTrue($order->charges->total == 1);
    }

    #Update an order
    public function testSuccesfulOrderUpdate()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);

        $updated_parameters = array(
            'line_items'=> array(
                array(
                    'name'=> 'Box of chocolates',
                    'description'=> 'Imported From Uruguay.',
                    'unit_price'=> 30000,
                    'quantity'=> 2,
                    'sku'=> 'choc_s3',
                    'category'=> 'expendables',
                    'type' => 'physical',
                    'tags' => array('Chocolate', 'Sudamerican chocolates')
                )
            ),
            'currency'    => 'USD'
        );

        $order->update($updated_parameters);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    public function testUnsuccessfulOrderUpdate()
    {
        $charges = array(
            array(
                'payment_method' => array(
                    'type' => 'oxxo_cash'
                ),
                'amount' => 10
            )
        );

        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);
        try {
            $order->update(array('charges' => $charges));
        } catch(Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }

    public function testSuccesfulOrderFind()
    {
        setApiKey();
        $id = \Conekta\Order::create(self::$valid_order)->id;
        $order = \Conekta\Order::find($id);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    public function testSuccesfulOrderWhere()
    {
        setApiKey();
        $orders = \Conekta\Order::where();

        $this->assertTrue(strpos(get_class($orders), 'ConektaList') !== false);
        $this->assertTrue(strpos($orders->elements_type, 'Order') !== false);
        $this->assertTrue(strpos(get_class($orders[0]), 'Order') !== false);
        $this->assertTrue(strpos(get_class(end($orders)), 'Order') !== false);
    }

    public function testSuccessfulLineItem()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);

        $line_item = $order->createLineItem(array(
            'name'=> 'Box of Cohiba S1s',
            'description'=> 'Imported From Mex.',
            'unit_price'=> 20000,
            'quantity'=> 1,
            'type' => 'physical',
            'tags' => array('food', 'mexican food')
        ));

        $this->assertTrue(strpos(get_class($line_item), 'LineItem') !== false);
        $this->assertTrue(strpos(get_class($order->line_items), 'ConektaList') !== false);
        $this->assertTrue($order->line_items->total == 2);
    }

    public function testSuccessfulTaxLine()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);

        $tax_line = $order->createTaxLine(array(
            'description' => 'IVA',
            'amount' => 60
        ));

        $tax_line = $order->createTaxLine(array(
            'description' => 'ISR',
            'amount' => 6
        ));

        $this->assertTrue(strpos(get_class($tax_line), 'TaxLine') !== false);
        $this->assertTrue(strpos(get_class($order->tax_lines), 'ConektaList') !== false);
        $this->assertTrue($order->tax_lines->total == 2);
    }

    public function testSuccessfulShippingLine()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);

        $shipping_line = $order->createShippingLine(array(
            'description' => 'Free Shipping',
            'amount' => 0,
            'tracking_number' => 'TRACK123',
            'carrier' => 'USPS',
            'method' => 'Train'
        ));

        $this->assertTrue(strpos(get_class($shipping_line), 'ShippingLine') !== false);
        $this->assertTrue(strpos(get_class($order->shipping_lines), 'ConektaList') !== false);
        $this->assertTrue($order->shipping_lines->total == 1);
    }

    public function testSuccessfulDiscountLine()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);
        $discount_line = $order->createDiscountLine(array(
            'code' => 'Cupon de descuento',
            'amount' => 10,
            'type' => 'loyalty'
        ));
        $this->assertTrue(strpos(get_class($discount_line), 'DiscountLine') !== false);
        $this->assertTrue(strpos(get_class($order->discount_lines), 'ConektaList') !== false);
        $this->assertTrue($order->discount_lines->total == 1);
    }

    public function testSuccessfulRefund()
    {
        $charges = array(
                'charges' => array(
                    array(
                        'payment_method' => array(
                            'type' => 'card',
                            'token_id' => 'tok_test_visa_4242'
                        ),
                        'amount' => 20000
                    )
                ),
                'currency'    => 'mxn',
                'customer_info' => array(
                    'name' => 'John Constantine',
                    'phone' => '+5213353319758',
                    'email' => 'hola@hola.com'
                )
            );
        setApiKey();
        $order = \Conekta\Order::create(array_merge(self::$valid_order, $charges));
        $order->refund(array_merge(self::$valid_refund, array('order_id' => $order->id)));
        $refundedOrder = \Conekta\Order::find($order->id);

        $this->assertTrue($refundedOrder->payment_status == 'refunded');
    }

    public function testSuccessfulCapture()
    {
        $charges =
            array(
                'pre_authorize' => true,
                'charges'       => array(
                    array(
                        'payment_method' => array(
                            'type'     => 'card',
                            'token_id' => 'tok_test_visa_4242'
                        ),
                        'amount' => 20000
                    )
                ),
                'currency'    => 'mxn',
                'customer_info' => array(
                    'name' => 'John Constantine',
                    'phone' => '+5213353319758',
                    'email' => 'hola@hola.com'
                )
            );
        setApiKey();
        $order = \Conekta\Order::create(array_merge(self::$valid_order, $charges));
        $this->assertTrue($order->payment_status == 'pre_authorized');
        $this->assertTrue($order->charges[0]->status == 'pre_authorized');

        $order->capture();

        $this->assertTrue($order->payment_status == 'paid');
        $this->assertTrue($order->charges[0]->status == 'paid');
    }
}
