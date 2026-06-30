<?php
/**
 * ShippingContactsApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\ShippingContactsApi;
use Conekta\Model\CustomerShippingContactsRequest;
use Conekta\Model\CustomerShippingContactsRequestAddress;
use Conekta\Model\CustomerShippingContactsResponse;
use Conekta\Model\CustomerUpdateShippingContactsRequest;

class ShippingContactsApiTest extends BaseTestCase
{
    private const CUSTOMER_ID = 'cus_2tXyF9BwPG14UMkkg';
    private const CUSTOMER_UPDATE_ID = 'cus_2tZWxbTPtQgGJGh8P';
    private const SHIPPING_CONTACT_ID = 'ship_cont_2tZWzJPBf87C6TcoQ';

    private function api(): ShippingContactsApi
    {
        return new ShippingContactsApi(null, self::$config);
    }

    public function testCreateCustomerShippingContacts()
    {
        $request = new CustomerShippingContactsRequest([
            'phone' => '1234567890',
            'receiver' => 'John Doe',
            'address' => new CustomerShippingContactsRequestAddress([
                'street1' => 'av siempre viva',
                'postal_code' => '11011',
                'country' => 'mx',
            ]),
        ]);

        $response = $this->api()->createCustomerShippingContacts(self::CUSTOMER_ID, $request);

        self::assertInstanceOf(CustomerShippingContactsResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testDeleteCustomerShippingContacts()
    {
        $response = $this->api()->deleteCustomerShippingContacts(self::CUSTOMER_UPDATE_ID, self::SHIPPING_CONTACT_ID);

        self::assertInstanceOf(CustomerShippingContactsResponse::class, $response);
        self::assertSame(self::SHIPPING_CONTACT_ID, $response->getId());
    }

    public function testUpdateCustomerShippingContacts()
    {
        $update = new CustomerUpdateShippingContactsRequest([
            'phone' => '+5215555555555',
            'receiver' => 'John Doe Updated',
        ]);

        $response = $this->api()->updateCustomerShippingContacts(self::CUSTOMER_UPDATE_ID, self::SHIPPING_CONTACT_ID, $update);

        self::assertInstanceOf(CustomerShippingContactsResponse::class, $response);
        self::assertSame(self::SHIPPING_CONTACT_ID, $response->getId());
    }
}
