<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';
class ConektaListTest extends TestCase
{
  function setApiKey()
  {
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
  }
  public function testSuccessfulNext()
  {
    $orderList = $this->createResponseMockUp();
    $window = \Conekta\Order::where(array('limit' => 5, "next" => $orderList[9]->id)); 
    $this->assertTrue($window[0]->id == $orderList[10]->id);
    $window->next(array('limit' => 1));
    $this->assertTrue($window[0]->id == $orderList[15]->id);
  }

  public function testSuccessfulPrevious()
  {
    $orderList = $this->createResponseMockUp();
    $window = \Conekta\Order::where(array('limit' => 5, 'next' => $orderList[14]->id));
    $this->assertTrue($window[0]->id == $orderList[15]->id);
    $window->previous(array('limit' => 1));
    $this->assertTrue($window[0]->id == $orderList[14]->id);
  }
  
  protected function createResponseMockUp(){
    $this->setApiKey();
    $overRootFolder   = "../support/fixtures/orders.json";
    $insideTestFolder = "test/support/fixtures/orders.json";
    $path = file_exists($overRootFolder) ? $overRootFolder: $insideTestFolder;
    $object        = file_get_contents($path);
    $jsonResponse  = json_decode($object, true);
    $orderList     = new \Conekta\ConektaList("Order", $jsonResponse);
    $orderList->loadFromArray($jsonResponse);
    
    return $orderList;
  }
  public function testSuccessfulEmptyNext()
  {
    $orderList = $this->createResponseMockUp();
    $window = \Conekta\Order::where(array('limit' => 5)); 
    $firstNext = $window->count();
    $firtsOrderId = $window[0]->id;
    $window->next(); //next => 5 order's
    $actualOrderId = $window[0]->id;
    $window->next(array('limit'=>10)); // next => 10 order's
    $secondNext = $window->count();
    $this->assertTrue($firstNext  == 5);
    $this->assertTrue($secondNext == 10);
    $this->assertTrue($firtsOrderId != $actualOrderId);
  }

}