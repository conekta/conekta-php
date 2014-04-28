<?php
class Conekta_ChargeTest extends UnitTestCase
{
	public static $valid_payment_method = array('amount' => 2000,
		'currency' => 'mxn', 'description' => 'Some desc');
	public static $invalid_payment_method = array('amount' => 10,
		'currency' => 'mxn', 'description' => 'Some desc');
	public static $valid_visa_card = array('card' => 'tok_test_visa_4242');
	public function testSuccesfulFindCharge()
	{
		$pm = self::$valid_payment_method;
		$card = self::$valid_visa_card;
		setApiKey();
		$cpm = Conekta_Charge::create(array_merge(
										$pm,
										$card));
		$this->assertTrue($cpm->status == "paid");
		$pm = Conekta_Charge::find($cpm->id);
		$this->assertTrue(strpos(get_class($pm), "Conekta_Charge") !== false);
	}
	public function testSuccesfulWhere()
	{
		
		setApiKey();
		$charges = Conekta_Charge::where();
		$this->assertTrue(strpos(get_class($charges), "Conekta_Object") !== false);
		$this->assertTrue(strpos(get_class($charges[0]), "Conekta_Charge") !== false);
	}
	public function testSuccesfulBankPMCreate()
	{
		$pm = self::$valid_payment_method;
		$bank = array('bank' => array('type' => 'banorte'));
		setApiKey();
		$bpm = Conekta_Charge::create(array_merge(
										$pm,
										$bank));
		$this->assertTrue($bpm->status == "pending_payment");
	}
	public function testSuccesfulCardPMCreate()
	{
		$pm = self::$valid_payment_method;
		$card = self::$valid_visa_card;
		setApiKey();
		$cpm = Conekta_Charge::create(array_merge(
										$pm,
										$card));
		$this->assertTrue($cpm->status == "paid");
	}
	public function testSuccesfulOxxoPMCreate()
	{
		$pm = self::$valid_payment_method;
		$oxxo = array('cash' => array('type' => 'oxxo'));
		setApiKey();
		$opm = Conekta_Charge::create(array_merge(
										$pm,
										$oxxo));
		$this->assertTrue($opm->status == "pending_payment");
	}
	public function testUnsuccesfulPMCreate()
	{
		$pm = self::$invalid_payment_method;
		$card = self::$valid_visa_card;
		setApiKey();
		try {
			$cpm = Conekta_Charge::create(array_merge(
											$pm,
											$card));
		} catch (Exception $e) {
			$this->assertTrue(strpos($e->getMessage(), "The minimum for card payments is 3 pesos. Check that the amount is in cents as explained in the documentation.") !== false);
		}	
	}
	public function testSuccesfulRefund()
	{
		$pm = self::$valid_payment_method;
		$card = self::$valid_visa_card;
		setApiKey();
		$cpm = Conekta_Charge::create(array_merge(
										$pm,
										$card));
		$this->assertTrue($cpm->status == "paid");
		$cpm->refund();
		$this->assertTrue($cpm->status == "refunded");
	}
	public function testUnsuccesfulRefund()
	{
		$pm = self::$valid_payment_method;
		$card = self::$valid_visa_card;
		setApiKey();
		$cpm = Conekta_Charge::create(array_merge(
										$pm,
										$card));
		$this->assertTrue($cpm->status == "paid");
		try {
			$cpm->refund(3000);
		} catch (Exception $e) {
			$this->assertTrue(strpos($e->getMessage(), "The order does not exist or the amount to refund is invalid") !== false);
		}	
	}
	public function testSuccesfulCapture()
	{
		$pm = self::$valid_payment_method;
		$card = self::$valid_visa_card;
		$capture = array('capture'=>false);
		setApiKey();
		$cpm = Conekta_Charge::create(array_merge(
										$pm,
										$card, 
										$capture));
		$this->assertTrue($cpm->status == "pre_authorized");
		$cpm->capture();
		$this->assertTrue($cpm->status == "paid");
	}
}
?>
