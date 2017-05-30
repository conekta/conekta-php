<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class TaxLineTest extends TestCase
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
    'line_items' => array(
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
    $this->setApiKey();
    $order = \Conekta\Order::create(self::$validOrder);
    $taxLine = $order->tax_lines[0];
    $taxLine->delete();
    $this->assertTrue($taxLine->deleted == true);
  }

  public function testSuccessfulTaxLineUpdate()
  {
    $this->setApiKey();
    $order = \Conekta\Order::create(self::$validOrder);
    $taxLine = $order->tax_lines[0];
    $taxLine->update(array('amount' => 10));
    $this->assertTrue($taxLine->amount == 10);
  }

  public function testUnsuccessfulTaxLineUpdate()
  {
    $this->setApiKey();
    $order = \Conekta\Order::create(self::$validOrder);
    $taxLine = $order->tax_lines[0];
    try {
      $taxLine->update(array('amount' => -1));
    } catch (Exception $e) {
      $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
    }
  }
}