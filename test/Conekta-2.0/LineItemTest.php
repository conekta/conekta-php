<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';


class LineItemTest extends TestCase
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
        'tags' => array('food', 'mexican food')
        ),
      array(
        'name'=> 'Box of Cohiba S1s',
        'description'=> 'Imported From Mex.',
        'unit_price'=> 3500,
        'quantity'=> 1,
        'tags' => array('food')
        )
      ),
    'currency'    => 'mxn'
    );

  public function testSuccessfulLineItemDelete()
  {
    $this->setApiKey();
    $order = \Conekta\Order::create(self::$validOrder);
    $lineItem = $order->line_items[0];
    $lineItem->delete();

    $this->assertTrue($lineItem->deleted == true);
  }

  public function testSuccessfulLineItemUpdate()
  {
    $this->setApiKey();
    $order = \Conekta\Order::create(self::$validOrder);
    $lineItem = $order->line_items[0];
    $lineItem->update(array('unit_price' => 1000));

    $this->assertTrue($lineItem->unit_price == 1000);
  }

  public function testUnsuccessfulLineItemUpdate()
  {
    $this->setApiKey();
    $order = \Conekta\Order::create(self::$validOrder);
    $lineItem = $order->line_items[0];
    try {
      $lineItem->update(array('unit_price' => -1));

    } catch(\Conekta\Handler $e) {
      $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
    }
  }
}