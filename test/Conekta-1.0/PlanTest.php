<?php

class PlanTest extends UnitTestCase
{
    public function testSuccesfulGetPlan()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $plans = \Conekta\Plan::where();
        $p = $plans[0];
        $plan = \Conekta\Plan::find($p->id);
        $this->assertTrue(strpos(get_class($plan), 'Plan') !== false);
    }

    public function testSuccesfulWhere()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $plans = \Conekta\Plan::where();
        $this->assertTrue(strpos(get_class($plans), 'Object') !== false);
        $this->assertTrue(strpos(get_class($plans[0]), 'Plan') !== false);
    }

    public function testSuccesfulPlanCreate()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $plans = \Conekta\Plan::where();
        $plan = \Conekta\Plan::create(array(
            'id'                => 'gold-plan'.substr('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(0, 50), 1).substr(md5(time()), 1),
            'name'              => 'Gold Plan',
            'amount'            => 10000,
            'currency'          => 'MXN',
            'interval'          => 'month',
            'frequency'         => 10,
            'trial_period_days' => 15,
            'expiry_count'      => 12,
        ));
        $this->assertTrue(strpos(get_class($plan), 'Plan') !== false);
    }

    public function testUpdatePlan()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $plans = \Conekta\Plan::where();
        $plan = $plans[0];
        $plan->update(array('name' => 'Silver Plan'));
        $this->assertTrue(strpos($plan->name, 'Silver Plan') !== false);
    }

    public function testDeletePlan()
    {
        setApiKey();
        setApiVersion('1.0.0');
        $plans = \Conekta\Plan::where();
        $plan = $plans[0];
        $plan->delete();
        $this->assertTrue($plan->deleted == true);
    }
}
