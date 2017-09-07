<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';
require_once dirname(__FILE__).'/../BaseTest.php';

class LogTest extends TestCase
{
  public function testSuccesfulFind()
  {
    BaseTest::setApiKey();
    BaseTest::setApiVersion('1.0.0');
    $logs = \Conekta\Log::where();
    $log = \Conekta\Log::find($logs[0]['id']);
    $this->assertTrue(strpos(get_class($log), 'Log') !== false);
  }

  public function testSuccesfulWhere()
  {
    BaseTest::setApiKey();
    BaseTest::setApiVersion('1.0.0');
    $logs = \Conekta\Log::where();
    $this->assertTrue(strpos(get_class($logs), 'Conekta\Object') !== false);
    $this->assertTrue(strpos(get_class($logs[0]), 'Conekta\Object') !== false);
  }
}
