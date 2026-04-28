<?php
/**
 * SubscriptionsApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\SubscriptionsApi;
use Conekta\ApiException;
use Conekta\Model\SubscriptionEventsResponse;
use Conekta\Model\SubscriptionRequest;
use Conekta\Model\SubscriptionResponse;
use Conekta\Model\UpdatesASubscription;

class SubscriptionsApiTest extends BaseTestCase
{
    private const CUSTOMER_ID = 'cus_2tZWxbTPtQgGJGh8P';
    private const CUSTOMER_EVENTS_ID = 'cus_2rKpeXQpapLonfVke';
    private const SUBSCRIPTION_ID = 'sub_2tXx8KUxw6311kEbw';

    private function api(): SubscriptionsApi
    {
        return new SubscriptionsApi(null, self::$config);
    }

    public function testCancelSubscription()
    {
        $response = $this->api()->cancelSubscription(self::CUSTOMER_ID);

        self::assertInstanceOf(SubscriptionResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testCreateSubscription()
    {
        $request = new SubscriptionRequest([
            'plan_id' => 'plan_2tZb5q8Z3PYpg6SJd',
            'card_id' => 'src_2tZWxbTPtQgGJGh8R',
        ]);

        $response = $this->api()->createSubscription(self::CUSTOMER_ID, $request);

        self::assertInstanceOf(SubscriptionResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testGetSubscription()
    {
        $response = $this->api()->getSubscription(self::CUSTOMER_ID);

        self::assertInstanceOf(SubscriptionResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testGetSubscriptionEvents()
    {
        $response = $this->api()->getSubscriptionEvents(self::CUSTOMER_EVENTS_ID);

        self::assertInstanceOf(SubscriptionEventsResponse::class, $response);
        self::assertSame('list', $response->getObject());
    }

    public function testPauseSubscription()
    {
        $response = $this->api()->pauseSubscription(self::CUSTOMER_ID);

        self::assertInstanceOf(SubscriptionResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testResumeSubscription()
    {
        $response = $this->api()->resumeSubscription(self::CUSTOMER_ID);

        self::assertInstanceOf(SubscriptionResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testUpdateSubscription()
    {
        $update = new UpdatesASubscription([
            'plan_id' => 'plan_2tZb5q8Z3PYpg6SJd',
        ]);

        $response = $this->api()->updateSubscription(self::CUSTOMER_ID, $update);

        self::assertInstanceOf(SubscriptionResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    /**
     * The subscriptionCancel method targets /customers/{customer_id}/subscriptions/{id}/cancel,
     * which is not in mockoon's mapped routes; the SDK should raise.
     */
    public function testSubscriptionCancel()
    {
        $this->expectException(ApiException::class);
        $this->api()->subscriptionCancel(self::CUSTOMER_ID, self::SUBSCRIPTION_ID);
    }

    public function testSubscriptionCreate()
    {
        $request = new SubscriptionRequest([
            'plan_id' => 'plan_2tZb5q8Z3PYpg6SJd',
        ]);

        $this->expectException(ApiException::class);
        $this->api()->subscriptionCreate(self::CUSTOMER_ID, $request);
    }

    public function testSubscriptionEvents()
    {
        $this->expectException(ApiException::class);
        $this->api()->subscriptionEvents(self::CUSTOMER_ID, self::SUBSCRIPTION_ID);
    }

    public function testSubscriptionList()
    {
        $this->expectException(ApiException::class);
        $this->api()->subscriptionList(self::CUSTOMER_ID);
    }

    public function testSubscriptionPause()
    {
        $this->expectException(ApiException::class);
        $this->api()->subscriptionPause(self::CUSTOMER_ID, self::SUBSCRIPTION_ID);
    }

    public function testSubscriptionResume()
    {
        $this->expectException(ApiException::class);
        $this->api()->subscriptionResume(self::CUSTOMER_ID, self::SUBSCRIPTION_ID);
    }

    public function testSubscriptionUpdate()
    {
        $update = new UpdatesASubscription([
            'plan_id' => 'plan_2tZb5q8Z3PYpg6SJd',
        ]);

        $this->expectException(ApiException::class);
        $this->api()->subscriptionUpdate(self::CUSTOMER_ID, self::SUBSCRIPTION_ID, $update);
    }

    public function testSubscriptionsGet()
    {
        $this->expectException(ApiException::class);
        $this->api()->subscriptionsGet(self::CUSTOMER_ID, self::SUBSCRIPTION_ID);
    }

    public function testSubscriptionsRetry()
    {
        $this->expectException(ApiException::class);
        $this->api()->subscriptionsRetry(self::CUSTOMER_ID, self::SUBSCRIPTION_ID);
    }
}
