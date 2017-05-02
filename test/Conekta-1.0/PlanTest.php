<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class PlanTest extends TestCase
{
  function setApiKey()
  {
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
  }
  function setApiVersion($version)
  {
    \Conekta\Conekta::setApiVersion($version);
  }
  public function testSuccesfulGetPlan()
  {
    $this->setApiKey();
    $this->setApiVersion('1.0.0');
    $plans = \Conekta\Plan::where();
    $plan = \Conekta\Plan::find($plans[0]->id);
    $this->assertTrue(strpos(get_class($plan), 'Plan') !== false);
  }

  public function testSuccesfulWhere()
  {
    $this->setApiKey();
    $this->setApiVersion('1.0.0');
    $plans = \Conekta\Plan::where();
    $this->assertTrue(strpos(get_class($plans), 'Object') !== false);
    $this->assertTrue(strpos(get_class($plans[0]), 'Plan') !== false);
  }

  public function testSuccesfulPlanCreate()
  {
    $this->setApiKey();
    $this->setApiVersion('1.0.0');
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
    $this->setApiKey();
    $this->setApiVersion('1.0.0');
    $plans = \Conekta\Plan::where();
    $plan = $plans[0];
    $plan->update(array('name' => 'Silver Plan'));
    $this->assertTrue(strpos($plan->name, 'Silver Plan') !== false);
  }

  public function testDeletePlan()
  {
    $this->setApiKey();
    $this->setApiVersion('1.0.0');
    $plans = \Conekta\Plan::where();
    $plan = $plans[0];
    $plan->delete();
    $this->assertTrue($plan->deleted == true);
  }
}
