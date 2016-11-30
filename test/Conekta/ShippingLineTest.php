<?php

class ShippingLineTest extends UnitTestCase
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
            'shipping_lines' => array(
                array(
                    'description' => 'Free Shipping',
                    'amount' => 0,
                    'tracking_number' => 'TRACK123',
                    'carrier' => 'USPS',
                    'method' => 'Train'
                ),
                array(
                    'description' => 'Free Shipping',
                    'amount' => 40,
                    'tracking_number' => 'TRACK124',
                    'carrier' => 'USPS',
                    'method' => 'Train'
                )
            )
        );

    public function testSuccessfulShippingLineDelete()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(self::$valid_order);
        $shipping_line = $order->shipping_lines[0];
        $shipping_line->delete();

        $this->assertTrue($shipping_line->deleted == true);
    }

    public function testSuccessfulShippingLineUpdate()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(self::$valid_order);
        $shipping_line = $order->shipping_lines[0];
        $shipping_line->update(array('method' => 'Air'));

        $this->assertTrue($shipping_line->method == 'Air');
    }
}