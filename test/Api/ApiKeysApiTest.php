<?php
/**
 * ApiKeysApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\ApiKeysApi;
use Conekta\Model\ApiKeyCreateResponse;
use Conekta\Model\ApiKeyRequest;
use Conekta\Model\ApiKeyResponse;
use Conekta\Model\ApiKeyUpdateRequest;
use Conekta\Model\DeleteApiKeysResponse;
use Conekta\Model\GetApiKeysResponse;

class ApiKeysApiTest extends BaseTestCase
{
    private const API_KEY_ID = '64625cc9f3e02c00163f5e4d';

    private function api(): ApiKeysApi
    {
        return new ApiKeysApi(null, self::$config);
    }

    public function testCreateApiKey()
    {
        $request = new ApiKeyRequest([
            'description' => 'online store',
            'role' => 'private',
        ]);

        $response = $this->api()->createApiKey($request, 'es');

        self::assertInstanceOf(ApiKeyCreateResponse::class, $response);
        self::assertSame('api_key', $response->getObject());
        self::assertNotEmpty($response->getId());
    }

    public function testDeleteApiKey()
    {
        $response = $this->api()->deleteApiKey(self::API_KEY_ID, 'es');

        self::assertInstanceOf(DeleteApiKeysResponse::class, $response);
        self::assertSame('api_key', $response->getObject());
        self::assertSame(self::API_KEY_ID, $response->getId());
    }

    public function testGetApiKey()
    {
        $response = $this->api()->getApiKey(self::API_KEY_ID, 'es');

        self::assertInstanceOf(ApiKeyResponse::class, $response);
        self::assertSame('api_key', $response->getObject());
        self::assertSame(self::API_KEY_ID, $response->getId());
    }

    public function testGetApiKeys()
    {
        $response = $this->api()->getApiKeys('es', null, 20);

        self::assertInstanceOf(GetApiKeysResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }

    public function testUpdateApiKey()
    {
        $update = new ApiKeyUpdateRequest([
            'active' => true,
            'description' => 'updated description',
        ]);

        $response = $this->api()->updateApiKey(self::API_KEY_ID, 'es', $update);

        self::assertInstanceOf(ApiKeyResponse::class, $response);
        self::assertSame('api_key', $response->getObject());
    }
}
