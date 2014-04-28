<?php
class Conekta_PlanTest extends UnitTestCase
{
	public function testSuccesfulGetPlan()
	{
		setApiKey();
		$plans = Conekta_Plan::where();
		$p = $plans[0];
		$plan = Conekta_Plan::find($p->id);
		$this->assertTrue(strpos(get_class($plan), "Conekta_Plan") !== false);
	}
	public function testSuccesfulWhere()
	{
		
		setApiKey();
		$plans = Conekta_Plan::where();
		$this->assertTrue(strpos(get_class($plans), "Conekta_Object") !== false);
		$this->assertTrue(strpos(get_class($plans[0]), "Conekta_Plan") !== false);
	}
	public function testSuccesfulPlanCreate()
	{
		setApiKey();
		$plans = Conekta_Plan::where();
		$plan = Conekta_Plan::create(array(
					'id' => "gold-plan".    substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ,mt_rand( 0 ,50 ) ,1 ) .substr( md5( time() ), 1),
					'name' => "Gold Plan",
					'amount' => 10000,
					'currency' => "MXN",
					'interval' => "month",
					'frequency' => 10,
					'trial_period_days' => 15,
					'expiry_count' => 12
					)
			);
		$this->assertTrue(strpos(get_class($plan), "Conekta_Plan") !== false);
	}
	public function testUpdatePlan()
	{
		setApiKey();
		$plans = Conekta_Plan::where();
		$plan = $plans[0];
		$plan->update(array('name' => "Silver Plan"));
		$this->assertTrue(strpos($plan->name, "Silver Plan") !== false);
	}
	public function testDeletePlan()
	{
		setApiKey();
		$plans = Conekta_Plan::where();
		$plan = $plans[0];
		$plan->delete();
		$this->assertTrue($plan->deleted == true);
	}
}
?>
