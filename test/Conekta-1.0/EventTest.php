<?php

namespace Conekta;

class EventTest extends BaseTest
{
	public function testSuccesfulWhere()
	{
		$this->setApiKey();
		$this->setApiVersion('1.0.0');
		$events = Event::where();
		$this->assertTrue(strpos(get_class($events), 'Object') !== false);
		$this->assertTrue(strpos(get_class($events[0]), 'Event') !== false);
	}
}
