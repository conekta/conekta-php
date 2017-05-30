<?php 
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class SubscriptionTest extends TestCase
{
  function setApiKey()
  {
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
  }
  public static $validCustomer = array(
        'email' => 'hola@hola.com',
        'name'  => 'John Constantine'
        );
  public static $validVisaCard =array('type' => 'card','token_id' => 'tok_test_visa_4242');

  public function testSuccesfulSubscriptionCreate()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $customer->createPaymentSource(self::$validVisaCard);
    $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
    $this->assertTrue(strpos(get_class($subscription), 'Conekta\Subscription') !== false);
  }

  public function testSuccesfulSubscriptionUpdate()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $customer->createPaymentSource(self::$validVisaCard);
    $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
    try {
      $plan = \Conekta\Plan::find('gold-plan2');
    } catch (Exception $e) {
      $plan = \Conekta\Plan::create(array(
        'id'                => 'gold-plan2',
        'name'              => 'Gold Plan',
        'amount'            => 10000,
        'currency'          => 'MXN',
        'interval'          => 'month',
        'frequency'         => 1,
        'trial_period_days' => 15,
        'expiry_count'      => 12,
        )
      );
    }
    $subscription->update(array('plan' => $plan->id));
    $this->assertTrue(strpos($subscription->plan_id, 'gold-plan2') !== false);
  }

  public function testUnsuccesfulSubscriptionCreate()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $customer->createPaymentSource(self::$validVisaCard);
    try {
      $subscription = $customer->createSubscription(array(
        'plan' => 'unexistent-plan', ));
    } catch (Exception $e) {
      $this->assertTrue(strpos($e->getMessage(), 'El recurso no ha sido encontrado') !== false);
    }
  }

  public function testSuccesfulSubscriptionPause()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $customer->createPaymentSource(self::$validVisaCard);
    $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
    $this->assertTrue(strpos(get_class($subscription), 'Subscription') !== false);
    $subscription->pause();
    $this->assertTrue(strpos($subscription->status, 'paused') !== false);
  }

  public function testSuccesfulSubscriptionResume()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $customer->createPaymentSource(self::$validVisaCard);
    $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
    $this->assertTrue(strpos(get_class($subscription), 'Subscription') !== false);
    $subscription->pause();
    $subscription->resume();
    $this->assertTrue(strpos($subscription->status, 'in_trial') !== false);
  }

  public function testSuccesfulSubscriptionCancel()
  {
    $this->setApiKey();
    $customer = \Conekta\Customer::create(self::$validCustomer);
    $customer->createPaymentSource(self::$validVisaCard);
    $subscription = $customer->createSubscription(array('plan' => 'gold-plan'));
    $this->assertTrue(strpos(get_class($subscription), 'Subscription') !== false);
    $subscription->cancel();
    $this->assertTrue(strpos($subscription->status, 'canceled') !== false);
  }
}