<?php

class Conekta_LogTest extends UnitTestCase
{
    public function testSuccesfulFind()
    {
        setApiKey();
        $log = Conekta_Log::find('5709515719ce880954005f91');
        $this->assertTrue(strpos(get_class($log), 'Conekta_Log') !== false);
    }
    public function testSuccesfulWhere()
    {
    	setApiKey();
    	$logs = Conekta_Log::where();
    	$this->assertTrue(strpos(get_class($logs), 'Conekta_Object') !== false);
    	$this->assertTrue(strpos(get_class($logs[0]), 'Conekta_Object') !== false);
    }
}
