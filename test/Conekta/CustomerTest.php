<?php
class Conekta_CustomerTest extends UnitTestCase
{
	public function testSuccesfulCustomerCreate()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$this->assertTrue(strpos(get_class($customer), "Conekta_Customer") !== false);
	}
	public function testSuccesfulCustomerFind()
	{
		setApiKey();
		$c = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$customer = Conekta_Customer::find($c->id);
		$this->assertTrue(strpos(get_class($customer), "Conekta_Customer") !== false);
	}
	public function testSuccesfulCustomerWhere()
	{
		setApiKey();
		$customers = Conekta_Customer::where();
		$this->assertTrue(strpos(get_class($customers), "Conekta_Object") !== false);
		$this->assertTrue(strpos(get_class($customers[0]), "Conekta_Customer") !== false);
	}
	public function testSuccesfulDeleteCustomer()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$customer->delete();
		$this->assertTrue($customer->deleted == true);
	}
	public function testSuccesfulCustomerUpdate()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$customer->update(
		  array(
			'name' => "Logan",
			'email' => 'logan@x-men.org',
		  ));
		$this->assertTrue(strpos($customer->name, "Logan") !== false);
	}
	public function testUnsuccesfulCustomerCreate()
	{
		setApiKey();
		try {
			$customer = Conekta_Customer::create(array(
							'cards' => array("tok_test_visa_4241")));
		} catch (Exception $e) {
			$this->assertTrue(strpos($e->getMessage(), "Object tok_test_visa_4241 could not be found.") !== false);
		}
	}
	public function testAddCardToCustomer()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$customer->createCard(array('token' => "tok_test_visa_1881"));
		$this->assertTrue(strpos(end($customer->cards)->last4, "1881") !== false);
	}
	public function testDeleteCard()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$card = $customer->cards[0]->delete();
		$this->assertTrue($card->deleted == true);
	}
	public function testUpdateCard()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$customer->cards[0]->update(array('token' => "tok_test_mastercard_4444", 'active' => false));
		$this->assertTrue(strpos($customer->cards[0]->last4, "4444") !== false);
	}
	public function testSuccesfulSubscriptionCreate()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
		$this->assertTrue(strpos(get_class($subscription), "Conekta_Subscription") !== false);
	}
	public function testSuccesfulSubscriptionUpdate()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
		try {
			$plan = Conekta_Plan::find("gold-plan2");
		} catch (Exception $e) {
			// Plan does not exist
			$plan = Conekta_Plan::create(array(
					'id' => "gold-plan2",
					'name' => "Gold Plan",
					'amount' => 10000,
					'currency' => "MXN",
					'interval' => "month",
					'frequency' => 1,
					'trial_period_days' => 15,
					'expiry_count' => 12
					)
			);
		}
		$subscription->update(array('plan'=>$plan->id));
		$this->assertTrue(strpos($subscription->plan_id, "gold-plan2") !== false);
	}
	public function testUnsuccesfulSubscriptionCreate()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		try {
			$subscription = $customer->createSubscription(array(
				'plan' => 'unexistent-plan'));
		} catch (Exception $e) {
			$this->assertTrue(strpos($e->getMessage(), "Object Plan unexistent-plan could not be found.") !== false);
		}	
	}
	public function testSuccesfulSubscriptionPause()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$subscription = $customer->createSubscription(array(
				'plan' => 'gold-plan'));
		$this->assertTrue(strpos(get_class($subscription), "Conekta_Subscription") !== false);
		$subscription->pause();
		$this->assertTrue(strpos($subscription->status, "paused") !== false);
	}
	public function testSuccesfulSubscriptionResume()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$subscription = $customer->createSubscription(array(
				'plan' => 'gold-plan'));
		$this->assertTrue(strpos(get_class($subscription), "Conekta_Subscription") !== false);
		$subscription->resume();
		$this->assertTrue(strpos($subscription->status, "active") !== false);
	}
	public function testSuccesfulSubscriptionCancel()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$subscription = $customer->createSubscription(array(
				'plan' => 'gold-plan'));
		$this->assertTrue(strpos(get_class($subscription), "Conekta_Subscription") !== false);
		$subscription->cancel();
		$this->assertTrue(strpos($subscription->status, "canceled") !== false);
	}
}
?>
