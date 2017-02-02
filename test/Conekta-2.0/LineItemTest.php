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
        $order = \Conekta\Order::create(self::$valid_order);
        $line_item = $order->line_items[0];
        $line_item->delete();

        $this->assertTrue($line_item->deleted == true);
    }

    public function testSuccessfulLineItemUpdate()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);
        $line_item = $order->line_items[0];
        $line_item->update(array('unit_price' => 1000));

        $this->assertTrue($line_item->unit_price == 1000);
    }

    public function testUnsuccessfulLineItemUpdate()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);
        $line_item = $order->line_items[0];
        try {
            $line_item->update(array('unit_price' => -1));

        } catch(Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }
}