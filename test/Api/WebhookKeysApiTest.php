<?php
/**
 * WebhookKeysApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\WebhookKeysApi;
use Conekta\Model\GetWebhookKeysResponse;
use Conekta\Model\WebhookKeyCreateResponse;
use Conekta\Model\WebhookKeyDeleteResponse;
use Conekta\Model\WebhookKeyRequest;
use Conekta\Model\WebhookKeyResponse;
use Conekta\Model\WebhookKeyUpdateRequest;

class WebhookKeysApiTest extends BaseTestCase
{
    private const WEBHOOK_KEY_DELETE_ID = '645a59da22e7da0001cad283';
    private const WEBHOOK_KEY_GET_ID = '645a5eb022e7da0001cad2a4';
    private const WEBHOOK_KEY_UPDATE_ID = '645a613622e7da0001cad882';

    private function api(): WebhookKeysApi
    {
        return new WebhookKeysApi(null, self::$config);
    }

    public function testCreateWebhookKey()
    {
        $request = new WebhookKeyRequest(['active' => true]);

        $response = $this->api()->createWebhookKey('es', $request);

        self::assertInstanceOf(WebhookKeyCreateResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testDeleteWebhookKey()
    {
        $response = $this->api()->deleteWebhookKey(self::WEBHOOK_KEY_DELETE_ID);

        self::assertInstanceOf(WebhookKeyDeleteResponse::class, $response);
        self::assertSame(self::WEBHOOK_KEY_DELETE_ID, $response->getId());
    }

    public function testGetWebhookKey()
    {
        $response = $this->api()->getWebhookKey(self::WEBHOOK_KEY_GET_ID);

        self::assertInstanceOf(WebhookKeyResponse::class, $response);
        self::assertSame(self::WEBHOOK_KEY_GET_ID, $response->getId());
    }

    public function testGetWebhookKeys()
    {
        // Mockoon's success branch is mapped to limit=2.
        $response = $this->api()->getWebhookKeys('es', null, 2);

        self::assertInstanceOf(GetWebhookKeysResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }

    public function testUpdateWebhookKey()
    {
        $update = new WebhookKeyUpdateRequest(['active' => false]);

        $response = $this->api()->updateWebhookKey(self::WEBHOOK_KEY_UPDATE_ID, 'es', $update);

        self::assertInstanceOf(WebhookKeyResponse::class, $response);
        self::assertSame(self::WEBHOOK_KEY_UPDATE_ID, $response->getId());
    }
}
