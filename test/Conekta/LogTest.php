<?php

class LogTest extends UnitTestCase
{
    public function testSuccesfulFind()
    {
        setApiKey();
        $log = \Conekta\Log::find('5709515719ce880954005f91');
        $this->assertTrue(strpos(get_class($log), 'Log') !== false);
    }
    public function testSuccesfulWhere()
    {
    	setApiKey();
    	$logs = \Conekta\Log::where();
    	$this->assertTrue(strpos(get_class($logs), 'Conekta_Object') !== false);
    	$this->assertTrue(strpos(get_class($logs[0]), 'Conekta_Object') !== false);
    }
}
