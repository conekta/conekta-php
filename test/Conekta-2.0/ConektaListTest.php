<?php

namespace Conekta;

class ConektaListTest extends BaseTest
{
  public function testSuccessfulNext()
  {
    $orderList = $this->createResponseMockUp();
    $window = Order::where(array('limit' => 5, "next" => $orderList[9]->id));
    $this->assertTrue($window[0]->id == $orderList[10]->id);
    $window->next(array('limit' => 1));
    $this->assertTrue($window[0]->id == $orderList[15]->id);
  }

  public function testSuccessfulPrevious()
  {
    $orderList = $this->createResponseMockUp();
    $window = Order::where(array('limit' => 5, 'next' => $orderList[14]->id));
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
    $orderList     = new ConektaList("Order", $jsonResponse);
    $orderList->loadFromArray($jsonResponse);
    
    return $orderList;
  }
  public function testSuccessfulEmptyNext()
  {
    $orderList = $this->createResponseMockUp();
    $window = Order::where(array('limit' => 5));

    $firtsOrderId = $window[0]->id;
    $window->next(); 
    $secondOrderId = $window[0]->id; 
    $firstNext = $window->count(); 
    $actualOrderId = $window[0]->id;
    $window->next(array('limit'=>10));
    $secondNext = $window->count();

    //first next witout params
    $this->assertTrue($firstNext  == 5);

    // second next with limit 10
    $this->assertTrue($secondNext == 10);
    
    // first order id index's never be the same after a next
    $this->assertTrue($firtsOrderId != $secondOrderId);
  }
  public function testSuccessfulEmptyPrevious()
  {
    $orderList = $this->createResponseMockUp();
    $window = Order::where(array('limit' => 10));

    $firtsOrderId = $window[0]->id;
    $window->next(); 
    $firstNext = $window->count(); 
    $window->previous(); 
    $returnNext = $window->count();
    $window->previous(array('limit'=>10)); 
    $secondOrderId = $window[0]->id; 

    // after return both id's have to be the same 
    $this->assertTrue($secondOrderId  == $firtsOrderId); 

    //  next match after return  previous runs over same index's
    $this->assertTrue($returnNext == $firstNext); 
  }

}