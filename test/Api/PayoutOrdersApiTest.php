<?php
/**
 * PayoutOrdersApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\PayoutOrdersApi;
use Conekta\ApiException;
use Conekta\Model\PayoutOrderRequest;
use Conekta\Model\PayoutOrderRequestCustomerInfo;
use Conekta\Model\PayoutOrderResponse;
use Conekta\Model\PayoutOrdersResponse;

class PayoutOrdersApiTest extends BaseTestCase
{
    private const PAYOUT_ID = 'f2654d66-d740-457a-9a8c-f96b5196f44e';

    private function api(): PayoutOrdersApi
    {
        return new PayoutOrdersApi(null, self::$config);
    }

    public function testCancelPayoutOrderById()
    {
        // Cancel endpoint is not mapped in mockoon; the SDK should raise.
        $this->expectException(ApiException::class);
        $this->api()->cancelPayoutOrderById(self::PAYOUT_ID);
    }

    public function testCreatePayoutOrder()
    {
        $request = new PayoutOrderRequest([
            'amount' => 3000,
            'currency' => 'MXN',
            'reason' => 'requested_by_client',
            'allowed_payout_methods' => ['cashout'],
            'customer_info' => new PayoutOrderRequestCustomerInfo([
                'name' => 'John Doe',
                'email' => 'jdoe@conekta.com',
                'phone' => '+5215555555555',
            ]),
        ]);

        $response = $this->api()->createPayoutOrder($request);

        self::assertInstanceOf(PayoutOrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testGetPayoutOrderById()
    {
        $response = $this->api()->getPayoutOrderById(self::PAYOUT_ID);

        self::assertInstanceOf(PayoutOrderResponse::class, $response);
        self::assertSame(self::PAYOUT_ID, $response->getId());
    }

    public function testGetPayoutOrders()
    {
        $response = $this->api()->getPayoutOrders('es');

        self::assertInstanceOf(PayoutOrdersResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }
}
