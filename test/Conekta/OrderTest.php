<?php

class OrderTest extends UnitTestCase
{
    public function testSuccesfulCreateOrder()
    {
        setApiKey();
        $order = \Conekta\Order::create(array(
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
            'amount' => 35000
        ));
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    public function testSuccesfulCreateOrderWithCharges()
    {
        setApiKey();
        $order = \Conekta\Order::create(array(
            'line_items'=> array(
                array(
                    'name'=> 'Box of Cohiba S2s',
                    'description'=> 'Imported From Mex.',
                    'unit_price'=> 20000,
                    'quantity'=> 1,
                    'sku'=> 'cohb_s1',
                    'category'=> 'food',
                    'type' => 'physical',
                    'tags' => array('food', 'mexican food')
                )
            ),
            'charges'=> array(
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
        ));
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

    public function testSuccesfulCustomerUpdate()
    {
        setApiKey();
        $order = \Conekta\Order::create(array(
            'line_items'=> array(
                array(
                    'name'=> 'Box of cigarrettes',
                    'description'=> 'Imported From Cuba.',
                    'unit_price'=> 40000,
                    'quantity'=> 3,
                    'sku'=> 'cohb_s3',
                    'category'=> 'expendables',
                    'type' => 'physical',
                    'tags' => array('cuban', 'cuban cigarrettes')
                )
            ),
            'currency'    => 'mxn'
        ));

        $order->update(array(
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
            ));
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }
}
