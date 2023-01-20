<?php

namespace Conekta;

class ChargeTest extends BaseTest
{
    public static $validOrder = [
    'line_items' => [
      [
        'name'        => 'Box of Cohiba S1s',
        'description' => 'Imported From Mex.',
        'unit_price'  => 20000,
        'quantity'    => 1,
        'sku'         => 'cohb_s1',
        'category'    => 'food',
        'tags'        => ['food', 'mexican food']
        ]
      ],
    'currency' => 'mxn',
    'metadata' => ['test' => 'extra info']
    ];
    public static $otherParams = [
    'currency'      => 'mxn',
    'customer_info' => [
      'name'  => 'John Constantine',
      'phone' => '+5213353319758',
      'email' => 'hola@hola.com'
      ]
    ];
    public static $chargeParams = ['payment_method' => ['type' => 'oxxo_cash'],'amount' => 20000];
    public static $bank = ['payment_method' => ['type' => 'banorte',], 'amount' => 20000];
    public static $spei = ['payment_method' => ['type' => 'spei',], 'amount' => 20000];
    public static $validVisaCard = ['payment_method' => ['type' => 'card','token_id' => 'tok_test_visa_4242']];
    public static $oxxo = ['payment_method' => ['type' => 'oxxo_cash',], 'amount' => 20000];
    public function testCreateOrder()
    {
        $this->setApiKey();
        $orderParams = array_merge(self::$validOrder, self::$otherParams);
        $order = Order::create($orderParams);
        $this->assertTrue(strpos(get_class($order), 'Order') !== false);

        return $order;
    }

    public function testSuccesfulFindCharge()
    {
        $order = $this->testCreateOrder();
        $charge = $order->createCharge(self::$chargeParams);
        $filterCharges = Order::find($charge->id);
        $validCharge = $filterCharges->charges[0];
        $this->assertTrue(strpos(get_class($validCharge), 'Charge') !== false);
    }

    public function testSuccesfulSpeiPMCreate()
    {
        $order = $this->testCreateOrder();
        $charge = $order->createCharge(self::$spei);

        $this->assertTrue($charge->payment_method->bank == 'STP');
        $this->assertTrue(intval($charge->payment_method->clabe) > 0);
        $this->assertTrue(is_numeric($charge->payment_method->expires_at));
        $this->assertTrue($charge->status == 'pending_payment');
    }

    public function testSuccesfulCardPMCreate()
    {
        $order = $this->testCreateOrder();
        $charge = $order->createCharge(self::$validVisaCard);

        $this->assertTrue($charge->status == 'paid');
    }

    public function testSuccesfulOxxoPMCreate()
    {
        $order = $this->testCreateOrder();
        $charge = $order->createCharge(self::$oxxo);

        $this->assertTrue(is_numeric($charge->payment_method->expires_at));
        $this->assertTrue($charge->payment_method->store_name == 'OXXO');
        $this->assertTrue($charge->status == 'pending_payment');
    }
}
