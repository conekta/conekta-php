<?php

namespace Conekta;

class LineItemTest extends BaseTest
{
    public static $validOrder
  = [
    'line_items' => [
      [
        'name'        => 'Box of Cohiba S1s',
        'description' => 'Imported From Mex.',
        'unit_price'  => 20000,
        'quantity'    => 1,
        'tags'        => ['food', 'mexican food']
        ],
      [
        'name'        => 'Box of Cohiba S1s',
        'description' => 'Imported From Mex.',
        'unit_price'  => 3500,
        'quantity'    => 1,
        'tags'        => ['food']
        ]
      ],
    'currency' => 'mxn'
    ];

    public function testSuccessfulLineItemDelete()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $lineItem = $order->line_items[0];
        $lineItem->delete();

        $this->assertTrue($lineItem->deleted == true);
    }

    public function testSuccessfulLineItemUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $lineItem = $order->line_items[0];
        $lineItem->update(['unit_price' => 1000]);

        $this->assertTrue($lineItem->unit_price == 1000);
    }

    public function testUnsuccessfulLineItemUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $lineItem = $order->line_items[0];
        try {
            $lineItem->update(['unit_price' => -1]);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
        }
    }
}
