<?php

class EventTest extends UnitTestCase
{
    public function testSuccesfulWhere()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $events = \Conekta\Event::where();
        $this->assertTrue(strpos(get_class($events), 'Object') !== false);
        $this->assertTrue(strpos(get_class($events[0]), 'Event') !== false);
    }
}
