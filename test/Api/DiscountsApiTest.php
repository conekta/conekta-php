<?php
/**
 * DiscountsApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\DiscountsApi;
use Conekta\Model\DiscountLinesResponse;
use Conekta\Model\GetOrderDiscountLinesResponse;
use Conekta\Model\OrderDiscountLinesRequest;
use Conekta\Model\UpdateOrderDiscountLinesRequest;

class DiscountsApiTest extends BaseTestCase
{
    private const ORDER_ID = 'ord_2tVyWPnCPWbrV37mW';
    private const DISCOUNT_GET_ORDER_ID = 'ord_2tkwrBmcvGnA9zdU9';
    private const DISCOUNT_GET_ID = 'dis_lin_2tkwrBmcvGnA9zdU6';
    private const DISCOUNT_ID = 'dis_lin_2tVyahK8Nts7rKRMZ';

    private function api(): DiscountsApi
    {
        return new DiscountsApi(null, self::$config);
    }

    public function testOrdersCreateDiscountLine()
    {
        $request = new OrderDiscountLinesRequest([
            'amount' => 500,
            'code' => 'PROMO',
            'type' => 'loyalty',
        ]);

        $response = $this->api()->ordersCreateDiscountLine(self::ORDER_ID, $request);

        self::assertInstanceOf(DiscountLinesResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testOrdersDeleteDiscountLines()
    {
        $response = $this->api()->ordersDeleteDiscountLines(self::ORDER_ID, self::DISCOUNT_ID);

        self::assertInstanceOf(DiscountLinesResponse::class, $response);
        self::assertSame(self::DISCOUNT_ID, $response->getId());
    }

    public function testOrdersGetDiscountLine()
    {
        $response = $this->api()->ordersGetDiscountLine(self::DISCOUNT_GET_ORDER_ID, self::DISCOUNT_GET_ID);

        self::assertInstanceOf(DiscountLinesResponse::class, $response);
        self::assertSame(self::DISCOUNT_GET_ID, $response->getId());
    }

    public function testOrdersGetDiscountLines()
    {
        $response = $this->api()->ordersGetDiscountLines(self::ORDER_ID, 'es', null, 20);

        self::assertInstanceOf(GetOrderDiscountLinesResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }

    public function testOrdersUpdateDiscountLines()
    {
        $update = new UpdateOrderDiscountLinesRequest([
            'amount' => 250,
            'code' => 'PROMO_UPDATED',
            'type' => 'loyalty',
        ]);

        $response = $this->api()->ordersUpdateDiscountLines(self::ORDER_ID, self::DISCOUNT_ID, $update);

        self::assertInstanceOf(DiscountLinesResponse::class, $response);
        self::assertSame(self::DISCOUNT_ID, $response->getId());
    }
}
