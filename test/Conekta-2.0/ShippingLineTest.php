<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class ShippingLineTest extends TestCase
{
  function setApiKey()
  {
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
  }
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
    'shipping_lines' => array(
      array(
        'description' => 'Free Shipping',
        'amount' => 0,
        'tracking_number' => 'TRACK123',
        'carrier' => 'USPS',
        'method' => 'Train'
        ),
      array(
        'description' => 'Free Shipping',
        'amount' => 40,
        'tracking_number' => 'TRACK124',
        'carrier' => 'USPS',
        'method' => 'Train'
        )
      )
    );

  public function testSuccessfulShippingLineDelete()
  {
    $this->setApiKey();
    $order = \Conekta\Order::create(self::$validOrder);
    $shippingLine = $order->shipping_lines[0];
    $shippingLine->delete();
    $this->assertTrue($shippingLine->deleted == true);
  }

  public function testSuccessfulShippingLineUpdate()
  {
    $this->setApiKey();
    $order = \Conekta\Order::create(self::$validOrder);
    $shippingLine = $order->shipping_lines[0];
    $shippingLine->update(array('method' => 'Air'));
    $this->assertTrue($shippingLine->method == 'Air');
  }

  public function testUnsuccessfulShippingLineUpdate()
  {
    $this->setApiKey();
    $order = \Conekta\Order::create(self::$validOrder);
    $shippingLine = $order->shipping_lines[0];
    try{
      $shippingLine->update(array('amount' => -1));
    } catch (Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
    }
  }
}