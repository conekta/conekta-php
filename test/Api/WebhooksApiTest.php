<?php
/**
 * WebhooksApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\WebhooksApi;
use Conekta\Model\GetWebhooksResponse;
use Conekta\Model\UpdateWebhook;
use Conekta\Model\WebhookRequest;
use Conekta\Model\WebhookResponse;

class WebhooksApiTest extends BaseTestCase
{
    private const WEBHOOK_ID = '641b1d5662d7e00001eaa46b';
    private const WEBHOOK_URL = 'https://webhook.site/0b8c9fa8-92c3-4a04-beea-a7ec037f6466';

    private function api(): WebhooksApi
    {
        return new WebhooksApi(null, self::$config);
    }

    public function testCreateWebhook()
    {
        $request = new WebhookRequest([
            'url' => self::WEBHOOK_URL,
            'subscribed_events' => ['charge.created', 'charge.paid'],
        ]);

        $response = $this->api()->createWebhook($request);

        self::assertInstanceOf(WebhookResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame(self::WEBHOOK_URL, $response->getUrl());
    }

    public function testDeleteWebhook()
    {
        $response = $this->api()->deleteWebhook(self::WEBHOOK_ID);

        self::assertInstanceOf(WebhookResponse::class, $response);
        self::assertSame(self::WEBHOOK_ID, $response->getId());
    }

    public function testGetWebhook()
    {
        $response = $this->api()->getWebhook(self::WEBHOOK_ID);

        self::assertInstanceOf(WebhookResponse::class, $response);
        self::assertSame(self::WEBHOOK_ID, $response->getId());
    }

    public function testGetWebhooks()
    {
        $response = $this->api()->getWebhooks();

        self::assertInstanceOf(GetWebhooksResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }

    public function testTestWebhook()
    {
        $response = $this->api()->testWebhook(self::WEBHOOK_ID);

        self::assertInstanceOf(WebhookResponse::class, $response);
        self::assertSame(self::WEBHOOK_ID, $response->getId());
    }

    public function testUpdateWebhook()
    {
        $update = new UpdateWebhook([
            'url' => self::WEBHOOK_URL,
            'active' => true,
        ]);

        $response = $this->api()->updateWebhook(self::WEBHOOK_ID, $update);

        self::assertInstanceOf(WebhookResponse::class, $response);
        self::assertSame(self::WEBHOOK_ID, $response->getId());
    }
}
