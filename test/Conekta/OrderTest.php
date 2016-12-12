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

    public function testSuccesfulCreateOrder()
    {
        setApiKey();
        setApiVersion("1.1.0");
        $order = \Conekta\Order::create(array_merge(self::$valid_order));
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);
    }

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
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(array_merge(self::$valid_order, $other_params));
        $charge_params = array(
            'source' => array('type' => 'oxxo_cash'),
            'amount' => 20000
        );
        $charge = $order->createCharge($charge_params);

        $this->assertTrue(strpos(get_class($charge), 'Charge') !== false);
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

    public function testSuccessfulLineItem()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(array_merge(self::$valid_order));

        $lineItem = $order->createLineItem(array(
            'name'=> 'Box of Cohiba S1s',
            'description'=> 'Imported From Mex.',
            'unit_price'=> 20000,
            'quantity'=> 1,
            'type' => 'physical',
            'tags' => array('food', 'mexican food')
        ));

        $this->assertTrue(strpos(get_class($lineItem), 'LineItem') !== false);
    }

    public function testSuccessfulTaxLine()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(array_merge(self::$valid_order));

        $taxLine = $order->createTaxLine(array(
            'description' => 'IVA',
            'amount' => 60
        ));

        $this->assertTrue(strpos(get_class($taxLine), 'TaxLine') !== false);
    }

    public function testSuccessfulShippingLine()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(array_merge(self::$valid_order));

        $shippingLine = $order->createShippingLine(array(
            'description' => 'Free Shipping',
            'amount' => 0,
            'tracking_number' => 'TRACK123',
            'carrier' => 'USPS',
            'method' => 'Train'
        ));

        $this->assertTrue(strpos(get_class($shippingLine), 'ShippingLine') !== false);
    }

    public function testSuccessfulDiscountLine()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(array_merge(self::$valid_order));

        $discountLine = $order->createDiscountLine(array(
            'description' => 'Cupon de descuento',
            'amount' => 10,
            'kind' => 'loyalty'
        ));

        $this->assertTrue(strpos(get_class($discountLine), 'DiscountLine') !== false);
    }

    public function testSuccessfulFiscalEntity()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(array_merge(self::$valid_order));

        $fiscalEntity = $order->createFiscalEntity(array(
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
                'zip' => '78216')
        ));

        $this->assertTrue(strpos(get_class($fiscalEntity), 'FiscalEntity') !== false);
    }

    public function testSuccessfulCapture()
    {
        $charges =
        array(
            'capture' => false,
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
        $this->assertTrue($order->capture == false);

        $order->capture();

        $this->assertTrue($order->capture == true);
    }
}
