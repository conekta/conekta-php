<?php
/**
 * SubscriptionsCustomerPortalApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\SubscriptionsCustomerPortalApi;
use Conekta\ApiException;

class SubscriptionsCustomerPortalApiTest extends BaseTestCase
{
    private const SUBSCRIPTION_ID = 'sub_2tXx8KUxw6311kEbw';

    private function api(): SubscriptionsCustomerPortalApi
    {
        return new SubscriptionsCustomerPortalApi(null, self::$config);
    }

    /**
     * Mockoon does not map /subscriptions/{subscription_id}/customer_portal,
     * so the SDK should raise an ApiException.
     */
    public function testCreateCustomerPortal()
    {
        $this->expectException(ApiException::class);
        $this->api()->createCustomerPortal(self::SUBSCRIPTION_ID);
    }

    public function testGetCustomerPortal()
    {
        $this->expectException(ApiException::class);
        $this->api()->getCustomerPortal(self::SUBSCRIPTION_ID);
    }
}
