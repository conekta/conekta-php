<?php

namespace Conekta;

class SubscriptionTest extends BaseTest
{
    public static $validCustomer = [
        'email' => 'hola@hola.com',
        'name'  => 'John Constantine'
        ];
    public static $validVisaCard = ['type' => 'card','token_id' => 'tok_test_visa_4242'];

    public function testSuccesfulSubscriptionCreate()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $customer->createPaymentSource(self::$validVisaCard);
        $subscription = $customer->createSubscription(['plan' => 'gold-plan']);
        $this->assertTrue(strpos(get_class($subscription), 'Conekta\Subscription') !== false);
    }

    public function testSuccesfulSubscriptionUpdate()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $customer->createPaymentSource(self::$validVisaCard);
        $subscription = $customer->createSubscription(['plan' => 'gold-plan']);
        try {
            $plan = Plan::find('gold-plan2');
        } catch (\Exception $e) {
            $plan = Plan::create(
                [
        'id'                => 'gold-plan2',
        'name'              => 'Gold Plan',
        'amount'            => 10000,
        'currency'          => 'MXN',
        'interval'          => 'month',
        'frequency'         => 1,
        'trial_period_days' => 15,
        'expiry_count'      => 12,
        ]
            );
        }
        $subscription->update(['plan' => $plan->id]);
        $this->assertTrue(strpos($subscription->plan_id, 'gold-plan2') !== false);
    }

    public function testUnsuccesfulSubscriptionCreate()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $customer->createPaymentSource(self::$validVisaCard);
        try {
            $subscription = $customer->createSubscription([
        'plan' => 'unexistent-plan', ]);
        } catch (\Exception $e) {
            $this->assertTrue(strpos($e->getMessage(), 'El recurso no ha sido encontrado') !== false);
        }
    }

    public function testSuccesfulSubscriptionPause()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $customer->createPaymentSource(self::$validVisaCard);
        $subscription = $customer->createSubscription(['plan' => 'gold-plan']);
        $this->assertTrue(strpos(get_class($subscription), 'Subscription') !== false);
        $subscription->pause();
        $this->assertTrue(strpos($subscription->status, 'paused') !== false);
    }

    public function testSuccesfulSubscriptionResume()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $customer->createPaymentSource(self::$validVisaCard);
        $subscription = $customer->createSubscription(['plan' => 'gold-plan']);
        $this->assertTrue(strpos(get_class($subscription), 'Subscription') !== false);
        $subscription->pause();
        $subscription->resume();
        $this->assertTrue(strpos($subscription->status, 'in_trial') !== false);
    }

    public function testSuccesfulSubscriptionCancel()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $customer->createPaymentSource(self::$validVisaCard);
        $subscription = $customer->createSubscription(['plan' => 'gold-plan']);
        $this->assertTrue(strpos(get_class($subscription), 'Subscription') !== false);
        $subscription->cancel();
        $this->assertTrue(strpos($subscription->status, 'canceled') !== false);
    }
}
