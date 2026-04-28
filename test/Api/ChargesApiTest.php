<?php
/**
 * ChargesApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\ChargesApi;
use Conekta\Model\ChargeOrderResponse;
use Conekta\Model\ChargeRequest;
use Conekta\Model\ChargeRequestPaymentMethod;
use Conekta\Model\ChargeResponse;
use Conekta\Model\ChargesOrderResponse;
use Conekta\Model\ChargeOrderResponsePaymentMethod;
use Conekta\Model\ChargeUpdateRequest;
use Conekta\Model\GetChargesResponse;

class ChargesApiTest extends BaseTestCase
{
    private function api(): ChargesApi
    {
        return new ChargesApi(null, self::$config);
    }

    public function testGetCharges()
    {
        $response = $this->api()->getCharges('es', null, 20);

        self::assertInstanceOf(GetChargesResponse::class, $response);
        self::assertNotEmpty($response->getData());
        self::assertIsBool($response->getHasMore());
        self::assertSame('list', $response->getObject());
        self::assertContainsOnlyInstancesOf(ChargeResponse::class, $response->getData());
    }

    public function testOrdersCreateCharge()
    {
        $request = new ChargeRequest([
            'amount' => 2000,
            'payment_method' => new ChargeRequestPaymentMethod([
                'type' => 'default',
            ]),
        ]);

        $response = $this->api()->ordersCreateCharge('ord_2tVKxbhNzfUnGjnXG', $request);

        self::assertInstanceOf(ChargeOrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('charge', $response->getObject());
        self::assertNotEmpty($response->getStatus());
        self::assertNotEmpty($response->getCurrency());
        self::assertIsInt($response->getAmount());
        self::assertIsInt($response->getCreatedAt());

        // Validate payment method structure
        $paymentMethod = $response->getPaymentMethod();
        self::assertNotNull($paymentMethod);
        self::assertInstanceOf(ChargeOrderResponsePaymentMethod::class, $paymentMethod);
        self::assertSame('default', $paymentMethod->getType());
        self::assertNotEmpty($paymentMethod->getObject());
    }

    public function testOrdersCreateCharges()
    {
        $request = new ChargeRequest([
            'amount' => 2000,
            'payment_method' => new ChargeRequestPaymentMethod([
                'type' => 'default',
            ]),
        ]);

        $response = $this->api()->ordersCreateCharges('ord_2wrW9arie9fUG4MfD', $request);

        self::assertInstanceOf(ChargesOrderResponse::class, $response);
        self::assertNotEmpty($response->getData());
        self::assertIsBool($response->getHasMore());
        self::assertSame('list', $response->getObject());
        self::assertContainsOnlyInstancesOf(ChargeResponse::class, $response->getData());
    }

    public function testUpdateCharge()
    {
        $update = new ChargeUpdateRequest([
            'reference_id' => 'reference_id_test',
        ]);

        $response = $this->api()->updateCharge('6524722f28c7ba0016a5b17d', $update);

        self::assertInstanceOf(ChargeResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('charge', $response->getObject());
        self::assertNotEmpty($response->getStatus());
        self::assertIsBool($response->getLivemode());
        self::assertNotEmpty($response->getCurrency());
        self::assertIsInt($response->getCreatedAt());
    }
}
