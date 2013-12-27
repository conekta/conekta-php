<?php
class Conekta_ChargeTest extends UnitTestCase
{
	public static $valid_payment_method = array('amount' => 2000,
		'currency' => 'mxn', 'description' => 'Some desc');
	public static $valid_visa_card = array('card' => 'tok_test_visa_4242');
	public function testSuccesfulBankPMCreate()
	{
		$pm = self::$valid_payment_method;
		$bank = array('bank' => array('type' => 'banorte'));
		setApiKey();
		try {
			$c = Conekta_Charge::create(array_merge(
											$pm,
											$bank));
			$this->assertTrue($c->status == "pending_payment");
		} catch (Exception $e) {
			echo "<span class='fail'>".$e->getMessage()."</span><br/>";
			$this->assertTrue(true == false);
		}
	}
	public function testSuccesfulCardPMCreate()
	{
		$pm = self::$valid_payment_method;
		$card = self::$valid_visa_card;
		setApiKey();
		try {
			$c = Conekta_Charge::create(array_merge(
											$pm,
											$card));
			$this->assertTrue($c->status == "paid");
		} catch (Exception $e) {
			echo "<span class='fail'>".$e->getMessage()."</span><br/>";
			$this->assertTrue(true == false);
		}
	}
	public function testSuccesfulOxxoPMCreate()
	{
		$pm = self::$valid_payment_method;
		$bank = array('cash' => array('type' => 'oxxo'));
		setApiKey();
		try {
			$c = Conekta_Charge::create(array_merge(
											$pm,
											$bank));
			$this->assertTrue($c->status == "pending_payment");
		} catch (Exception $e) {
			echo "<span class='fail'>".$e->getMessage()."</span><br/>";
			$this->assertTrue(true == false);
		}
	}
}
?>
