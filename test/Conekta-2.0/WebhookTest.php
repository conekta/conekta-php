<?php

namespace Conekta;

class WebhookTest extends BaseTest
{
  public static $events = array("events" => 
    array("charge.created", "charge.paid", "charge.under_fraud_review",
      "charge.fraudulent", "charge.refunded", "charge.created", "customer.created",
      "customer.updated", "customer.deleted", "webhook.created", "webhook.updated",
      "webhook.deleted", "charge.chargeback.created", "charge.chargeback.updated",
      "charge.chargeback.under_review", "charge.chargeback.lost", "charge.chargeback.won",
      "payout.created", "payout.retrying", "payout.paid_out", "payout.failed",
      "plan.created", "plan.updated", "plan.deleted", "subscription.created",
      "subscription.paused", "subscription.resumed", "subscription.canceled",
      "subscription.expired", "subscription.updated", "subscription.paid",
      "subscription.payment_failed", "payee.created", "payee.updated",
      "payee.deleted", "payee.payout_method.created",
      "payee.payout_method.updated", "payee.payout_method.deleted"));

  public static $url = array("url" => "http://www.example.com/my_listener");

  public function testSuccesfulWebhookCreate()
  {
    $this->setApiKey();
    $webhook = Webhook::create(array_merge(self::$url, self::$events));
    $this->assertTrue(strpos(get_class($webhook), 'Webhook') !== false);
    $this->assertTrue(strpos($webhook->webhook_url, self::$url["url"]) !== false);
    $webhook->update(array("url" => "http://www.example.com/my_listener"));
    $this->assertTrue(strpos($webhook->webhook_url, "http://www.example.com/my_listener") !== false);
    $webhook->delete();
  }
}
