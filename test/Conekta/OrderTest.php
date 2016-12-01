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
            'currency'    => 'mxn'
        );

    #Create order
    public function testSuccesfulCreateOrder()
    {
        setApiKey();
        setApiVersion("1.1.0");
        $order = \Conekta\Order::create(array_merge(self::$valid_order));
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    #Create Order with charges
    public function testSuccesfulCreateOrderWithCharges()
    {
        $charges =
        array(
            'charges' => array(
                array(
                    'source' => array(
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
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(array_merge(self::$valid_order, $charges));
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    #Update an order
    public function testSuccesfulOrderUpdate()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(array_merge(self::$valid_order));

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
                'source' => array(
                    'type' => 'oxxo_cash'
                ),
                'amount' => 10
            )
        );

        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(array_merge(self::$valid_order));
        try {
            $order->update(array('charges' => $charges));
        } catch(Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }

    public function testSuccesfulOrderFind()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $id = \Conekta\Order::create(array_merge(self::$valid_order))->id;
        $order = \Conekta\Order::find($id);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    public function testSuccesfulOrderWhere()
    {
        setApiKey();
        setApiVersion("1.1.0");
        $orders = \Conekta\Order::where();

        $this->assertTrue(strpos(get_class($orders), 'ConektaList') !== false);
        $this->assertTrue(strpos($orders->elements_type, 'Order') !== false);
        $this->assertTrue(strpos(get_class($orders[0]), 'Order') !== false);
    }

}
