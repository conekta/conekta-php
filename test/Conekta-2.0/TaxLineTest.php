<?php

namespace Conekta;

class TaxLineTest extends BaseTest
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
    'tax_lines' => [
      [
        'description' => 'IVA',
        'amount'      => 60
        ],
      [
        'description' => 'ISR',
        'amount'      => 100
        ]
      ],
    'currency' => 'mxn'
    ];

    public function testSuccessfulTaxLineDelete()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $taxLine = $order->tax_lines[0];
        $taxLine->delete();
        $this->assertTrue($taxLine->deleted == true);
    }

    public function testSuccessfulTaxLineUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $taxLine = $order->tax_lines[0];
        $taxLine->update(['amount' => 10]);
        $this->assertTrue($taxLine->amount == 10);
    }

    public function testUnsuccessfulTaxLineUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $taxLine = $order->tax_lines[0];
        try {
            $taxLine->update(['amount' => -1]);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
        }
    }
}
