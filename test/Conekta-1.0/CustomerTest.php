<?php

class CustomerTest extends UnitTestCase
{
    public static $valid_customer = array(
        'email' => 'hola@hola.com',
        'name'  => 'John Constantine'
    );

    public function testSuccesfulCustomerFind()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $c = \Conekta\Customer::create(self::$valid_customer);
        $customer = \Conekta\Customer::find($c->id);
        $this->assertTrue(strpos(get_class($customer), 'Customer') !== false);
    }

    public function testSuccesfulCustomerWhere()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $customers = \Conekta\Customer::where();
        $this->assertTrue(strpos(get_class($customers), 'Object') !== false);
        $this->assertTrue(strpos(get_class($customers[0]), 'Customer') !== false);
    }

    public function testSuccesfulCustomerUpdate()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $customer->update(
            array(
                'name'  => 'Logan',
                'email' => 'logan@x-men.org',
            ));
        $this->assertTrue(strpos($customer->name, 'Logan') !== false);
    }

    
   public function testAddCardToCustomer()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $customer->createCard(array('token' => 'tok_test_visa_1881'));
        $this->assertTrue(strpos(end($customer->cards)->last4, '1881') !== false);
    }

    public function testDeleteCard()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $card = array('cards' => array('tok_test_visa_4242'));
        $customer = \Conekta\Customer::create(array_merge(self::$valid_customer, $card));
        $card = $customer->cards[0]->delete();
        $this->assertTrue($card->deleted == true);
    }

    public function testUpdateCard()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $card = array('cards' => array('tok_test_visa_4242'));
        $customer = \Conekta\Customer::create(array_merge(self::$valid_customer, $card));
        $customer->cards[0]->update(array('token' => 'tok_test_mastercard_4444', 'active' => false));
        $this->assertTrue(strpos($customer->cards[0]->last4, '4444') !== false);    
    }

    public function testSuccesfulSubscriptionCreate()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $card = array('cards' => array('tok_test_visa_4242'));
        $customer = \Conekta\Customer::create(array_merge(self::$valid_customer, $card));
        $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
        $this->assertTrue(strpos(get_class($subscription), 'Conekta\Subscription') !== false);
    }

    public function testSuccesfulSubscriptionUpdate()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $card = array('cards' => array('tok_test_visa_4242'));
        $customer = \Conekta\Customer::create(array_merge(self::$valid_customer, $card));
        $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
        try {
            $plan = \Conekta\Plan::find('gold-plan2');
        } catch (Exception $e) {
            $plan = \Conekta\Plan::create(array(
                'id'                => 'gold-plan2',
                'name'              => 'Gold Plan',
                'amount'            => 10000,
                'currency'          => 'MXN',
                'interval'          => 'month',
                'frequency'         => 1,
                'trial_period_days' => 15,
                'expiry_count'      => 12,
            )
            );
        }
        $subscription->update(array('plan' => $plan->id));
        $this->assertTrue(strpos($subscription->plan_id, 'gold-plan2') !== false);
    }

    public function testUnsuccesfulSubscriptionCreate()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        try {
            $subscription = $customer->createSubscription(array(
                'plan' => 'unexistent-plan', ));
        } catch (Exception $e) {
            $this->assertTrue(strpos($e->getMessage(), 'The object Plan "unexistent-plan" could not be found.') !== false);
        }
    }

    public function testSuccesfulSubscriptionPause()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $card = array('cards' => array('tok_test_visa_4242'));
        $customer = \Conekta\Customer::create(array_merge(self::$valid_customer, $card));
        $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
        $this->assertTrue(strpos(get_class($subscription), 'Subscription') !== false);
        $subscription->pause();
        $this->assertTrue(strpos($subscription->status, 'paused') !== false);
    }

    public function testSuccesfulSubscriptionResume()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $card = array('cards' => array('tok_test_visa_4242'));
        $customer = \Conekta\Customer::create(array_merge(self::$valid_customer, $card));
        $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
        $this->assertTrue(strpos(get_class($subscription), 'Subscription') !== false);
        $subscription->pause();
        $subscription->resume();
        $this->assertTrue(strpos($subscription->status, 'in_trial') !== false);
    }

    public function testSuccesfulSubscriptionCancel()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $customer = \Conekta\Customer::create(self::$valid_customer);
        $card = array('cards' => array('tok_test_visa_4242'));
        $customer = \Conekta\Customer::create(array_merge(self::$valid_customer, $card));
        $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
        $this->assertTrue(strpos(get_class($subscription), 'Subscription') !== false);
        $subscription->cancel();
        $this->assertTrue(strpos($subscription->status, 'canceled') !== false);
    }

}
