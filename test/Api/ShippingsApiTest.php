<?php
/**
 * ShippingsApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\ShippingsApi;
use Conekta\Model\ShippingOrderResponse;
use Conekta\Model\ShippingRequest;

class ShippingsApiTest extends BaseTestCase
{
    private const ORDER_ID = 'ord_2tVyWPnCPWbrV37mW';
    private const SHIPPING_ID = 'ship_lin_2tVzNuDGSaDwreMg6';

    private function api(): ShippingsApi
    {
        return new ShippingsApi(null, self::$config);
    }

    public function testOrdersCreateShipping()
    {
        $request = new ShippingRequest([
            'amount' => 1500,
            'carrier' => 'FEDEX',
            'tracking_number' => 'TRACK_TEST',
            'method' => 'overnight',
        ]);

        $response = $this->api()->ordersCreateShipping(self::ORDER_ID, $request);

        self::assertInstanceOf(ShippingOrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testOrdersDeleteShipping()
    {
        $response = $this->api()->ordersDeleteShipping(self::ORDER_ID, self::SHIPPING_ID);

        self::assertInstanceOf(ShippingOrderResponse::class, $response);
        self::assertSame(self::SHIPPING_ID, $response->getId());
    }

    public function testOrdersUpdateShipping()
    {
        $update = new ShippingRequest([
            'amount' => 2000,
            'carrier' => 'DHL',
            'tracking_number' => 'TRACK_TEST_UPDATED',
            'method' => 'overnight',
        ]);

        $response = $this->api()->ordersUpdateShipping(self::ORDER_ID, self::SHIPPING_ID, $update);

        self::assertInstanceOf(ShippingOrderResponse::class, $response);
        self::assertSame(self::SHIPPING_ID, $response->getId());
    }
}
