<?php
class Conekta_EventTest extends UnitTestCase
{
	public function testSuccesfulWhere()
	{
		setApiKey();
		$events = Conekta_Event::where();
		$this->assertTrue(strpos(get_class($events), "Conekta_Object") !== false);
		$this->assertTrue(strpos(get_class($events[0]), "Conekta_Event") !== false);
	}
}
?>
