<?php
class Conekta_ChargeTest extends UnitTestCase
{
	public function testCreate()
	{
		authorizeFromEnv();
		$c = Conekta_Charge::create(array('amount' => 2000,
						'currency' => 'mxn', 'description' => 'Some desc',
						'card' => array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015, 'cvc' => 123, 'name' => 'Mario Moreno')));
		$this->assertTrue($c->status == "paid");
	}
}
?>
