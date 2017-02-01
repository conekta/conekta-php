<?php

class ConektaListTest extends UnitTestCase
{
 
    public function testSuccessfulNext()
    {
        setApiKey();
        $order_list = $this->createResponseMockUp();
        $window = \Conekta\Order::where(array('limit' => 5, "next" => $order_list[9]->id)); 
        $this->assertTrue($window[0]->id == $order_list[10]->id);
        $window->next(array('limit' => 1));
        $this->assertTrue($window[0]->id == $order_list[15]->id);
    }

    
    public function testSuccessfulPrevious()
    {
        setApiKey();
        $order_list = $this->createResponseMockUp();
        $window = \Conekta\Order::where(array('limit' => 5, 'next' => $order_list[14]->id));
        $this->assertTrue($window[0]->id == $order_list[15]->id);
        $window->previous(array('limit' => 1));
        $this->assertTrue($window[0]->id == $order_list[14]->id);
    }
    

    protected function createResponseMockUp(){
        $string        = file_get_contents("test/support/fixtures/orders.json");
        $json_response = json_decode($string, true);
        $order_list    = new \Conekta\ConektaList("Order", $json_response);
        $order_list->loadFromArray($json_response);
        return $order_list;
    }

}