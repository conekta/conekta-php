<?php

namespace Conekta;

class LogTest extends BaseTest
{
  public function testSuccesfulFind()
  {
    $this->setApiKey();
    $this->setApiVersion('1.0.0');
    $logs = Log::where();
    $log = Log::find($logs[0]['id']);
    $this->assertTrue(strpos(get_class($log), 'Log') !== false);
  }

  public function testSuccesfulWhere()
  {
    $this->setApiKey();
    $this->setApiVersion('1.0.0');
    $logs = Log::where();
    $this->assertTrue(strpos(get_class($logs), 'Conekta\ConektaObject') !== false);
    $this->assertTrue(strpos(get_class($logs[0]), 'Conekta\ConektaObject') !== false);
  }
}
