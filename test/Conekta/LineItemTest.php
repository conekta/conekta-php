<?php

class LineItemTest extends UnitTestCase
{
    public static $valid_order =
        array(
            'line_items'=> array(
                array(
                    'name'=> 'Box of Cohiba S1s',
                    'description'=> 'Imported From Mex.',
                    'unit_price'=> 20000,
                    'quantity'=> 1,
                    'type' => 'physical',
                    'tags' => array('food', 'mexican food')
                ),
                array(
                    'name'=> 'Box of Cohiba S1s',
                    'description'=> 'Imported From Mex.',
                    'unit_price'=> 3500,
                    'quantity'=> 1,
                    'type' => 'physical',
                    'tags' => array('food')
                )
            ),
            'currency'    => 'mxn'
        );

    public function testSuccessfulLineItemDelete()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(self::$valid_order);
        $line_item = $order->line_items[0];
        $line_item->delete();

        $this->assertTrue($line_item->deleted == true);
    }

    public function testSuccessfulLineItemUpdate()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(self::$valid_order);
        $line_item = $order->line_items[0];
        $line_item->update(array('unit_price' => 1000));

        $this->assertTrue($line_item->unit_price == 1000);
    }
}