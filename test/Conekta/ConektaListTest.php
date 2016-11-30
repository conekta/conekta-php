<?php

class ConektaListTest extends UnitTestCase
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

    public static $valid_customer =
        array('email' => 'hola@hola.com',
              'name' => 'John Constantine',
              'sources' => array(array(
                'token_id' => 'tok_test_visa_4242',
                'type' => 'card'
            ))
        );

    public function testSuccessfulNext()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $customers = \Conekta\Customer::where();
        $first_window = \Conekta\Customer::where(array('limit' => 10));
        $first_window->next(array('limit' => 1));
        $id = $first_window[0]->id;

        $this->assertTrue($id == $customers[10]->id);
    }

    public function testSuccessfulPrevious()
    {
        setApiKey();
        setApiVersion('1.1.0');
        $order = \Conekta\Order::create(self::$valid_order);
        $orders = \Conekta\Order::where();

        $last_window = \Conekta\Order::where(array('limit' => 10, 'starting_after' => $orders[9]->id));
        $last_window->previous(array('limit' => 1));
        $id = $last_window[0]->id;

        $this->assertTrue($id == $orders[9]->id);
    }

}