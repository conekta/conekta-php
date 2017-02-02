<?php

class LogTest extends UnitTestCase
{
    public function testSuccesfulFind()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $logs = \Conekta\Log::where();
        $log = \Conekta\Log::find($logs[0]['id']);
        $this->assertTrue(strpos(get_class($log), 'Log') !== false);
    }

    public function testSuccesfulWhere()
    {
        setApiKey();
        setApiVersion('1.0.0');
    	$logs = \Conekta\Log::where();
    	$this->assertTrue(strpos(get_class($logs), 'Conekta\Object') !== false);
    	$this->assertTrue(strpos(get_class($logs[0]), 'Conekta\Object') !== false);
    }
}
