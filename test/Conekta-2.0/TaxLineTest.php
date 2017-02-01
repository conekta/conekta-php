<?php

class TaxLineTest extends UnitTestCase
{
    public static $valid_order =
        array(
            'line_items' => array(
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
            'tax_lines' => array(
                array(
                    'description' => 'IVA',
                    'amount' => 60
                ),
                array(
                    'description' => 'ISR',
                    'amount' => 100
                )
            ),
            'currency'    => 'mxn'
        );

    public function testSuccessfulTaxLineDelete()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);
        $tax_line = $order->tax_lines[0];
        $tax_line->delete();

        $this->assertTrue($tax_line->deleted == true);
    }

    public function testSuccessfulTaxLineUpdate()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);
        $tax_line = $order->tax_lines[0];
        $tax_line->update(array('amount' => 10));

        $this->assertTrue($tax_line->amount == 10);
    }

    public function testUnsuccessfulTaxLineUpdate()
    {
        setApiKey();
        $order = \Conekta\Order::create(self::$valid_order);
        $tax_line = $order->tax_lines[0];
        try {
            $tax_line->update(array('amount' => -1));
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }
}