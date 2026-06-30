<?php
/**
 * EventsApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\EventsApi;
use Conekta\Model\EventResponse;
use Conekta\Model\EventsResendResponse;
use Conekta\Model\GetEventsResponse;
use Conekta\Model\ResendEventRequest;

class EventsApiTest extends BaseTestCase
{
    private const EVENT_ID = '63fe3d2ddf70970001cfb41a';
    private const RESEND_EVENT_ID = '6463d6e35a4c3e001819e761';

    private function api(): EventsApi
    {
        return new EventsApi(null, self::$config);
    }

    public function testGetEvent()
    {
        $response = $this->api()->getEvent(self::EVENT_ID);

        self::assertInstanceOf(EventResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testGetEvents()
    {
        $response = $this->api()->getEvents();

        self::assertInstanceOf(GetEventsResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }

    public function testResendEvent()
    {
        $request = new ResendEventRequest([
            'webhooks_ids' => ['webhook_test_id'],
        ]);

        $response = $this->api()->resendEvent(self::RESEND_EVENT_ID, $request);

        self::assertInstanceOf(EventsResendResponse::class, $response);
    }
}
