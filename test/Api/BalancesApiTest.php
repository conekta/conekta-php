<?php
/**
 * BalancesApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\BalancesApi;
use Conekta\Model\BalanceResponse;

class BalancesApiTest extends BaseTestCase
{
    public function testGetBalance()
    {
        $api = new BalancesApi(null, self::$config);
        $response = $api->getBalance('es');

        self::assertInstanceOf(BalanceResponse::class, $response);
    }
}
