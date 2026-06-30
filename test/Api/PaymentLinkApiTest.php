<?php
/**
 * PaymentLinkApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\PaymentLinkApi;
use Conekta\Model\Checkout;
use Conekta\Model\CheckoutOrderTemplate;
use Conekta\Model\CheckoutOrderTemplateCustomerInfo;
use Conekta\Model\CheckoutResponse;
use Conekta\Model\CheckoutsResponse;
use Conekta\Model\EmailCheckoutRequest;
use Conekta\Model\Product;
use Conekta\Model\SmsCheckoutRequest;

class PaymentLinkApiTest extends BaseTestCase
{
    private const CHECKOUT_GET_ID = 'bac0ed14-6888-4d1d-927a-c80d3f55c009';
    private const CHECKOUT_CANCEL_ID = 'c7734ada-e1e9-4b22-90f6-b80a1b2006d4';
    private const CHECKOUT_EMAIL_ID = '102bdf5c-3ee6-48ec-a9ff-40ec6f5f054b';
    private const CHECKOUT_SMS_ID = 'ce1076bb-5ee6-4d08-a0e2-ec0bfbc49883';

    private function api(): PaymentLinkApi
    {
        return new PaymentLinkApi(null, self::$config);
    }

    public function testCancelCheckout()
    {
        $response = $this->api()->cancelCheckout(self::CHECKOUT_CANCEL_ID);

        self::assertInstanceOf(CheckoutResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testCreateCheckout()
    {
        $checkout = new Checkout([
            'name' => 'Payment Link Name',
            'type' => 'PaymentLink',
            'recurrent' => false,
            'expires_at' => time() + (60 * 60 * 24 * 30),
            'allowed_payment_methods' => ['cash', 'card', 'bank_transfer'],
            'needs_shipping_contact' => false,
            'order_template' => new CheckoutOrderTemplate([
                'currency' => 'MXN',
                'customer_info' => new CheckoutOrderTemplateCustomerInfo([
                    'name' => 'Juan Perez',
                    'email' => 'juan@conekta.com',
                    'phone' => '+5215555555555',
                ]),
                'line_items' => [
                    new Product([
                        'name' => 'Payment Link Item',
                        'unit_price' => 1500,
                        'quantity' => 1,
                    ]),
                ],
            ]),
        ]);

        $response = $this->api()->createCheckout($checkout);

        self::assertInstanceOf(CheckoutResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testEmailCheckout()
    {
        $request = new EmailCheckoutRequest(['email' => 'juan@conekta.com']);

        $response = $this->api()->emailCheckout(self::CHECKOUT_EMAIL_ID, $request);

        self::assertInstanceOf(CheckoutResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testGetCheckout()
    {
        $response = $this->api()->getCheckout(self::CHECKOUT_GET_ID);

        self::assertInstanceOf(CheckoutResponse::class, $response);
        self::assertSame(self::CHECKOUT_GET_ID, $response->getId());
    }

    public function testGetCheckouts()
    {
        $response = $this->api()->getCheckouts('es');

        self::assertInstanceOf(CheckoutsResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }

    public function testSmsCheckout()
    {
        $request = new SmsCheckoutRequest(['phonenumber' => '+5215555555555']);

        $response = $this->api()->smsCheckout(self::CHECKOUT_SMS_ID, $request);

        self::assertInstanceOf(CheckoutResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }
}
