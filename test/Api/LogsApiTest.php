<?php
/**
 * LogsApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\LogsApi;
use Conekta\Model\LogResponseForRequest;
use Conekta\Model\LogsResponseForRequest;

class LogsApiTest extends BaseTestCase
{
    private const LOG_ID = '6419dd15b985080001fc280e';

    private function api(): LogsApi
    {
        return new LogsApi(null, self::$config);
    }

    public function testGetLogById()
    {
        $response = $this->api()->getLogById(self::LOG_ID);

        self::assertInstanceOf(LogResponseForRequest::class, $response);
        self::assertSame(self::LOG_ID, $response->getId());
    }

    public function testGetLogs()
    {
        $response = $this->api()->getLogs('es', null, 20);

        self::assertInstanceOf(LogsResponseForRequest::class, $response);
        self::assertNotEmpty($response->getData());
    }
}
