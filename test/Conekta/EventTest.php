<?php

class EventTest extends UnitTestCase
{
    public function testSuccesfulWhere()
    {
        setApiKey();
        $events = \Conekta\Event::where();
        $this->assertTrue(strpos(get_class($events), 'Object') !== false);
        $this->assertTrue(strpos(get_class($events[0]), 'Event') !== false);
    }
}
