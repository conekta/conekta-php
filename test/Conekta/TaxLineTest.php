<?php

class TaxLineTest extends UnitTestCase
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

    public static $tax_line = array(
            'tax_lines' => array(
              array("description" => "IVA", "amount" => 600),
              array("description" => "ISR", "amount" => 100)
            )
          );

    public function testSuccesfulUpdateTaxLine()
    {
        setApiKey();
        $order = \Conekta\Order::create(array_merge(self::$valid_order, self::$tax_line));

    }

    public function testSuccesfulDeleteTaxLine()
    {
        setApiKey();
        $order = \Conekta\Order::create(array_merge(self::$valid_order, self::$tax_line));
        echo "Printing Taxline";
        echo $order;
        $order->tax_lines[0]->delete();


    }
}