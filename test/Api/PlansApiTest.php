<?php
/**
 * PlansApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\PlansApi;
use Conekta\Model\GetPlansResponse;
use Conekta\Model\PlanRequest;
use Conekta\Model\PlanResponse;
use Conekta\Model\UpdatePlan;

class PlansApiTest extends BaseTestCase
{
    private const PLAN_ID = 'plan_2tZb5q8Z3PYpg6SJd';

    private function api(): PlansApi
    {
        return new PlansApi(null, self::$config);
    }

    public function testCreatePlan()
    {
        $request = new PlanRequest([
            'name' => 'Gold Plan',
            'amount' => 10000,
            'currency' => 'MXN',
            'interval' => 'month',
            'frequency' => 1,
            'expiry_count' => 12,
            'trial_period_days' => 15,
        ]);

        $response = $this->api()->createPlan($request);

        self::assertInstanceOf(PlanResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testDeletePlan()
    {
        $response = $this->api()->deletePlan(self::PLAN_ID);

        self::assertInstanceOf(PlanResponse::class, $response);
        self::assertSame(self::PLAN_ID, $response->getId());
    }

    public function testGetPlan()
    {
        $response = $this->api()->getPlan(self::PLAN_ID);

        self::assertInstanceOf(PlanResponse::class, $response);
        self::assertSame(self::PLAN_ID, $response->getId());
    }

    public function testGetPlans()
    {
        $response = $this->api()->getPlans();

        self::assertInstanceOf(GetPlansResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }

    public function testUpdatePlan()
    {
        $update = new UpdatePlan([
            'name' => 'Gold Plan Updated',
            'amount' => 15000,
        ]);

        $response = $this->api()->updatePlan(self::PLAN_ID, $update);

        self::assertInstanceOf(PlanResponse::class, $response);
        self::assertSame(self::PLAN_ID, $response->getId());
    }
}
