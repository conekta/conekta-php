<?php
/**
 * OrdersApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\OrdersApi;
use Conekta\Model\ChargeRequest;
use Conekta\Model\ChargeRequestPaymentMethod;
use Conekta\Model\CustomerInfoCustomerId;
use Conekta\Model\GetOrdersResponse;
use Conekta\Model\OrderCaptureRequest;
use Conekta\Model\OrderRefundRequest;
use Conekta\Model\ChargeResponsePaymentMethod;
use Conekta\Model\ChargesDataResponse;
use Conekta\Model\OrderRequest;
use Conekta\Model\OrderResponse;
use Conekta\Model\OrderUpdate;
use Conekta\Model\Product;

class OrdersApiTest extends BaseTestCase
{
    private const ORDER_GET_ID = 'ord_2tUyGSk9TNWUcyvjn';
    private const ORDER_UPDATE_ID = 'ord_2tVPCGRXnMXKdvcsj';
    private const ORDER_CANCEL_ID = 'ord_2tqaGQYZyvBsMKEgs';
    private const ORDER_CAPTURE_ID = 'ord_2tVKoTd79XK1GqJme';
    private const ORDER_REFUND_ID = 'ord_2tV52JvSom2w3E8bX';

    private function api(): OrdersApi
    {
        return new OrdersApi(null, self::$config);
    }

    public function testCancelOrder()
    {
        $response = $this->api()->cancelOrder(self::ORDER_CANCEL_ID);

        self::assertInstanceOf(OrderResponse::class, $response);
        self::assertSame(self::ORDER_CANCEL_ID, $response->getId());
        self::assertSame('canceled', $response->getPaymentStatus());
        self::assertSame('order', $response->getObject());
        self::assertIsBool($response->getLivemode());
        self::assertNotEmpty($response->getCurrency());
        self::assertIsInt($response->getCreatedAt());
    }

    public function testCreateOrder()
    {
        // The card-token-with-id branch is mapped to a clean order response in mockoon.
        $request = new OrderRequest([
            'currency' => 'MXN',
            'customer_info' => new CustomerInfoCustomerId([
                'customer_id' => 'cus_2tKcHxhTz7xU5SymF',
            ]),
            'line_items' => [
                new Product([
                    'name' => 'Box of Cohiba S1s',
                    'unit_price' => 35000,
                    'quantity' => 1,
                ]),
            ],
            'charges' => [
                new ChargeRequest([
                    'payment_method' => new ChargeRequestPaymentMethod([
                        'type' => 'card',
                        'token_id' => 'tok_2znsHppi6bHeDPSHi',
                    ]),
                ]),
            ],
        ]);

        $response = $this->api()->createOrder($request);

        self::assertInstanceOf(OrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('order', $response->getObject());
        self::assertSame('MXN', $response->getCurrency());
        self::assertIsBool($response->getLivemode());
        self::assertNotEmpty($response->getPaymentStatus());
        self::assertNotNull($response->getCustomerInfo());
        self::assertIsInt($response->getCreatedAt());

        // Validate charges and payment method structure
        $charges = $response->getCharges();
        self::assertNotNull($charges);
        $chargesData = $charges->getData();
        self::assertNotEmpty($chargesData);
        self::assertContainsOnlyInstancesOf(ChargesDataResponse::class, $chargesData);

        $charge = $chargesData[0];
        $paymentMethod = $charge->getPaymentMethod();
        self::assertNotNull($paymentMethod);
        self::assertInstanceOf(ChargeResponsePaymentMethod::class, $paymentMethod);
        self::assertSame('credit', $paymentMethod->getType());
        self::assertSame('card_payment', $paymentMethod->getObject());
        self::assertNotEmpty($paymentMethod->getLast4());
        self::assertNotEmpty($paymentMethod->getBrand());
        self::assertNotEmpty($paymentMethod->getExpMonth());
        self::assertNotEmpty($paymentMethod->getExpYear());
    }

    public function testGetOrderById()
    {
        $response = $this->api()->getOrderById(self::ORDER_GET_ID);

        self::assertInstanceOf(OrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('order', $response->getObject());
        self::assertNotEmpty($response->getCurrency());
        self::assertIsBool($response->getLivemode());
        self::assertNotEmpty($response->getPaymentStatus());
        self::assertIsInt($response->getCreatedAt());

        // Validate charges and payment method structure
        $charges = $response->getCharges();
        self::assertNotNull($charges);
        $chargesData = $charges->getData();
        self::assertNotEmpty($chargesData);
        self::assertContainsOnlyInstancesOf(ChargesDataResponse::class, $chargesData);

        $charge = $chargesData[0];
        $paymentMethod = $charge->getPaymentMethod();
        self::assertNotNull($paymentMethod);
        self::assertInstanceOf(ChargeResponsePaymentMethod::class, $paymentMethod);
        self::assertSame('credit', $paymentMethod->getType());
        self::assertSame('card_payment', $paymentMethod->getObject());
    }

    public function testGetOrders()
    {
        // Mockoon has a clean orders list mapped to limit=21 + previous=ord_2tHuXwkFTkjAbMGjU.
        $response = $this->api()->getOrders('es', null, 21, null, null, 'ord_2tHuXwkFTkjAbMGjU');

        self::assertInstanceOf(GetOrdersResponse::class, $response);
        self::assertNotEmpty($response->getData());
        self::assertIsBool($response->getHasMore());
        self::assertSame('list', $response->getObject());
        self::assertContainsOnlyInstancesOf(OrderResponse::class, $response->getData());
    }

    public function testOrderCancelRefund()
    {
        $response = $this->api()->orderCancelRefund(self::ORDER_REFUND_ID, 'refund_test_id');

        self::assertInstanceOf(OrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('order', $response->getObject());
        self::assertIsBool($response->getLivemode());
        self::assertNotEmpty($response->getCurrency());
    }

    public function testOrderRefund()
    {
        $request = new OrderRefundRequest([
            'amount' => 1000,
            'reason' => 'requested_by_client',
        ]);

        $response = $this->api()->orderRefund(self::ORDER_REFUND_ID, $request);

        self::assertInstanceOf(OrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('order', $response->getObject());
        self::assertIsBool($response->getLivemode());
        self::assertNotEmpty($response->getCurrency());
    }

    public function testOrdersCreateCapture()
    {
        $request = new OrderCaptureRequest([
            'amount' => 40000,
        ]);

        $response = $this->api()->ordersCreateCapture(self::ORDER_CAPTURE_ID, 'es', null, $request);

        self::assertInstanceOf(OrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('order', $response->getObject());
        self::assertIsBool($response->getLivemode());
        self::assertNotEmpty($response->getCurrency());
    }

    public function testUpdateOrder()
    {
        $update = new OrderUpdate([
            'currency' => 'MXN',
            'line_items' => [
                new Product([
                    'name' => 'Box of Cohiba S1s',
                    'unit_price' => 35000,
                    'quantity' => 1,
                ]),
            ],
        ]);

        $response = $this->api()->updateOrder(self::ORDER_UPDATE_ID, $update);

        self::assertInstanceOf(OrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('order', $response->getObject());
        self::assertIsBool($response->getLivemode());
        self::assertNotEmpty($response->getCurrency());
        self::assertIsInt($response->getCreatedAt());
    }
}
