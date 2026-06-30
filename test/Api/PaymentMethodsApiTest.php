<?php
/**
 * PaymentMethodsApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\PaymentMethodsApi;
use Conekta\Model\CreateCustomerPaymentMethodsRequest;
use Conekta\Model\CreateCustomerPaymentMethodsResponse;
use Conekta\Model\GetPaymentMethodResponse;
use Conekta\Model\PaymentMethodCashRequest;
use Conekta\Model\UpdateCustomerPaymentMethodsResponse;
use Conekta\Model\UpdatePaymentMethodsCard;

class PaymentMethodsApiTest extends BaseTestCase
{
    private const CUSTOMER_ID = 'cus_2tXyF9BwPG14UMkkg';
    private const CUSTOMER_UPDATE_ID = 'cus_2tZWxbTPtQgGJGh8P';
    private const PAYMENT_SOURCE_ID = 'src_2tZWxbTPtQgGJGh8R';
    private const CUSTOMER_LIST_ID = 'src_2tbd5Bgy67RL9oycM';

    private function api(): PaymentMethodsApi
    {
        return new PaymentMethodsApi(null, self::$config);
    }

    public function testCreateCustomerPaymentMethods()
    {
        $request = new PaymentMethodCashRequest([
            'type' => 'cash_recurrent',
        ]);

        $response = $this->api()->createCustomerPaymentMethods(self::CUSTOMER_ID, $request);

        self::assertInstanceOf(CreateCustomerPaymentMethodsResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testDeleteCustomerPaymentMethods()
    {
        $response = $this->api()->deleteCustomerPaymentMethods(self::CUSTOMER_UPDATE_ID, self::PAYMENT_SOURCE_ID);

        self::assertInstanceOf(UpdateCustomerPaymentMethodsResponse::class, $response);
        self::assertSame(self::PAYMENT_SOURCE_ID, $response->getId());
    }

    public function testGetCustomerPaymentMethods()
    {
        $response = $this->api()->getCustomerPaymentMethods(self::CUSTOMER_LIST_ID);

        self::assertInstanceOf(GetPaymentMethodResponse::class, $response);
        self::assertSame('list', $response->getObject());
        self::assertNotEmpty($response->getData());
    }

    public function testUpdateCustomerPaymentMethods()
    {
        $update = new UpdatePaymentMethodsCard([
            'name' => 'updated name',
            'expires_at' => 1893456000,
        ]);

        $response = $this->api()->updateCustomerPaymentMethods(self::CUSTOMER_UPDATE_ID, self::PAYMENT_SOURCE_ID, $update);

        self::assertInstanceOf(UpdateCustomerPaymentMethodsResponse::class, $response);
        self::assertSame(self::PAYMENT_SOURCE_ID, $response->getId());
    }
}
