<?php
class Conekta_TokenTest extends UnitTestCase
{
	public function testSuccesfulGetToken()
	{
		setApiKey();
		$token = Conekta_Plan::find("tok_test_visa_4242");
		$this->assertTrue(strpos(get_class($token), "Conekta_Token") !== false);
	}
}
?>
