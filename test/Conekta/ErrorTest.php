<?php
class Conekta_ErrorTest extends UnitTestCase
{
	public function testNoIdError()
	{
		setApiKey();
		try {
			$charge = Conekta_Charge::find('0');
		} catch (Exception $e) {
			$this->assertTrue(strpos($e->getMessage(), "Could not get the id of Conekta_Resource instance.") !== false);
		}
	}
	public function testNoConnectionError()
	{
		$apiUrl = Conekta::$apiBase;
		Conekta::$apiBase = 'http://localhost:3001';
		try {
		$customer = Conekta_Customer::create(array(
					'cards' => array("tok_test_visa_4242")));
		} catch (Exception $e) {
			$this->assertTrue(strpos(get_class($e), "Conekta_NoConnectionError") !== false);
		}
		Conekta::$apiBase = $apiUrl;
	}
	public function testApiError()
	{
		setApiKey();
		try {
			$customer = Conekta_Customer::create(array(
					'cards' => array(0=>"tok_test_visa_4242")));
		} catch (Exception $e) {
			$this->assertTrue(strpos(get_class($e), "Conekta_ApiError") !== false);
		}
	}
	public function testAuthenticationError()
	{
		unsetApiKey();
		try {
			$customer = Conekta_Customer::create(array(
					'cards' => array("tok_test_visa_4242")));
		} catch (Exception $e) {
			$this->assertTrue(strpos(get_class($e), "Conekta_AuthenticationError") !== false);
		}
		setApiKey();
	}
	public function testParameterValidationError()
	{
		setApiKey();
		try {
			$plan = Conekta_Plan::create(array('id' => "gold-plan"));
		} catch (Exception $e) {
			$this->assertTrue(strpos(get_class($e), "Conekta_ParameterValidationError") !== false);
		}
	}
	public function testProcessingError()
	{
		$charges = Conekta_Charge::where();
		foreach ($charges as $charge) {
			if (strpos($charge->status, "pre_authorized") !== false) {
				$ok = true;
				continue;
			}
		}
		try {
			if (isset($ok)) {
				$charge->capture();
			}
		} catch (Exception $e) {
			$this->assertTrue(strpos(get_class($e), "Conekta_ProcessingError") !== false);
		}
	}
	public function testResourceNotFoundError()
	{
		setApiKey();
		try {
			$charge = Conekta_Charge::find('1');
		} catch (Exception $e) {
			$this->assertTrue(strpos(get_class($e), "Conekta_ResourceNotFoundError") !== false);
		}
	}
}
?>
