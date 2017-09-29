<?php

namespace Conekta;

class DiscountLineTest extends BaseTest
{
  public static $validOrder =
  array(
    'line_items'=> array(
      array(
        'name'=> 'Box of Cohiba S1s',
        'description'=> 'Imported From Mex.',
        'unit_price'=> 20000,
        'quantity'=> 1,
        'sku'=> 'cohb_s1',
        'category'=> 'food',
        'tags' => array('food', 'mexican food')
        )
      ),
    'currency'    => 'mxn',
    'discount_lines' => array(
      array(
        'code' => 'Cupon de descuento',
        'amount' => 10,
        'type' => 'loyalty'
        ),
      array(
        'code' => 'Cupon de descuento',
        'amount' => 5,
        'type' => 'loyalty'
        )
      )
    );

  public function testSuccessfulDiscountLineDelete()
  {
    $this->setApiKey();
    $order = Order::create(self::$validOrder);
    $discountLine = $order->discount_lines[0];
    $discountLine->delete();

    $this->assertTrue($discountLine->deleted == true);
  }

  public function testSuccessfulDiscountLineUpdate()
  {
    $this->setApiKey();
    $order = Order::create(self::$validOrder);
    $discountLine = $order->discount_lines[0];
    $discountLine->update(array('amount' => 11));

    $this->assertTrue($discountLine->amount == 11);
  }

  public function testUnsuccessfulDiscountLineUpdate()
  {
    $this->setApiKey();
    $order = Order::create(self::$validOrder);
    $discountLine = $order->discount_lines[0];
    try{
      $discountLine->update(array('amount' => -1));
    } catch(\Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
    }
  }

}