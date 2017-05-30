<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class LogTest extends TestCase
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
  public function testSuccesfulFind()
  {
    $this->setApiKey();
    $this->setApiVersion('1.0.0');
    $logs = \Conekta\Log::where();
    $log = \Conekta\Log::find($logs[0]['id']);
    $this->assertTrue(strpos(get_class($log), 'Log') !== false);
  }

  public function testSuccesfulWhere()
  {
    $this->setApiKey();
    $this->setApiVersion('1.0.0');
    $logs = \Conekta\Log::where();
    $this->assertTrue(strpos(get_class($logs), 'Conekta\Object') !== false);
    $this->assertTrue(strpos(get_class($logs[0]), 'Conekta\Object') !== false);
  }
}
