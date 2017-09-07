<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';
require_once dirname(__FILE__).'/../BaseTest.php';

class EventTest extends BaseTest
{
	public function testSuccesfulWhere()
	{
		$this->setApiKey();
		$this->setApiVersion('1.0.0');
		$events = \Conekta\Event::where();
		$this->assertTrue(strpos(get_class($events), 'Object') !== false);
		$this->assertTrue(strpos(get_class($events[0]), 'Event') !== false);
	}
}
