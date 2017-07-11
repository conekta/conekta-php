<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class EventTest extends TestCase
{
	function setApiKey()
	{
		$apiEnvKey = getenv('CONEKTA_API');
		if (!$apiEnvKey) {
			$apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
		}
		\Conekta\Conekta::setApiKey($apiEnvKey);
	}
	function setApiVersion($version)
	{
		\Conekta\Conekta::setApiVersion($version);
	}
	public function testSuccesfulWhere()
	{
		$this->setApiKey();
		$this->setApiVersion('1.0.0');
		$events = \Conekta\Event::where();
		$this->assertTrue(strpos(get_class($events), 'Object') !== false);
		$this->assertTrue(strpos(get_class($events[0]), 'Event') !== false);
	}
}
