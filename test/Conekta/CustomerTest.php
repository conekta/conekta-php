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
	public function testUnsuccesfulCustomerCreate()
	{
		setApiKey();
		try {
			$customer = Conekta_Customer::create(array(
							'cards' => array("tok_test_visa_4241")));
		} catch (Exception $e) {
			$this->assertTrue(strpos($e->getMessage(), "Token 'tok_test_visa_4241' could not be found") !== false);
		}
	}
	public function testAddCardToCustomer()
	{
		setApiKey();
		$customer = Conekta_Customer::create(array(
						'cards' => array("tok_test_visa_4242")));
		$customer->createCard(array('token' => "tok_test_visa_1881"));
		$this->assertTrue(count($customer->cards) == 2);
		$this->assertTrue(strpos($customer->cards[0]->last4, "1881") !== false);
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
}
?>
