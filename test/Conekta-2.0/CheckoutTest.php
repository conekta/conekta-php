<?php

namespace Conekta;

class CheckoutTest extends BaseTest
{
  public static $validCheckout = array(
      'name' => "Payment Link Name",
      'type' => "PaymentLink",
      'recurrent' => false,
      'allowed_payment_methods' => array("cash", "card", "bank_transfer"),
      'needs_shipping_contact' => false,
      'order_template' => array(
        'line_items' => array(array(
          'name' => "Red Wine",
          'unit_price' => 1000,
          'quantity' => 10
        )),
        'metadata' => array(
          'mycustomkey' => "12345",
          'othercustomkey' => "abcd"
        ),
        'currency' => "MXN",
        'customer_info' => array(
          'name' => "Juan Perez",
          'email' => "juan.perez@conekta.com",
          'phone' => "5566982090"
        )
      )
    );

  public static $validCheckoutWithMsi = array(
    'name' => "Payment Link Name",
    'type' => "PaymentLink",
    'recurrent' => false,
    'allowed_payment_methods' => array("cash", "card", "bank_transfer"),
    'needs_shipping_contact' => false,
    'monthly_installments_enabled' => true,
    'monthly_installments_options' => [3,6,12],
    'order_template' => array(
      'line_items' => array(array(
        'name' => "Red Wine",
        'unit_price' => 30000,
        'quantity' => 10
      )),
      'metadata' => array(
        'mycustomkey' => "12345",
        'othercustomkey' => "abcd"
      ),
      'currency' => "MXN",
      'customer_info' => array(
        'name' => "Juan Perez",
        'email' => "juan.perez@conekta.com",
        'phone' => "5566982090"
      )
    )
  );

  public static $invalidCheckout = array(
    'names'  => 'John Constantine'
  );

  public function setUp() : void
  {
    $this->setApiKey();
    if (Conekta::$apiBase == 'https://api.conekta.io') {
      $this->markTestSkipped('This test should be run in staging.');
    }
  }

  public function testSuccesfulCheckoutCreate()
  {
    self::$validCheckout['name'] = 'Payment Link Name ' . time();
    self::$validCheckout['expired_at'] = static::getExpiredAt();
    $checkout = Checkout::create(self::$validCheckout);
    $this->assertTrue(strpos(get_class($checkout), 'Checkout') !== false);
    $this->assertEquals(false, $checkout->livemode);
    $this->assertEquals(self::$validCheckout['name'], $checkout->name);
    $this->assertEquals(false, $checkout->needs_shipping_contact);
    $this->assertStringStartsWith("https://pay.conekta", $checkout->url);
    $this->assertStringEndsWith($checkout->slug, $checkout->url);
    $this->assertTrue(strlen($checkout->id) == 36);

    return $checkout;
  }

  public function testSuccesfulCheckoutCreateWithMSI()
  {
    self::$validCheckoutWithMsi['name'] = 'Payment Link Name ' . time();
    self::$validCheckoutWithMsi['expired_at'] = static::getExpiredAt();
    $checkout = Checkout::create(self::$validCheckoutWithMsi);
    $this->assertTrue(strpos(get_class($checkout), 'Checkout') !== false);
    $this->assertEquals(false, $checkout->livemode);
    $this->assertEquals(self::$validCheckoutWithMsi['name'], $checkout->name);
    $this->assertEquals(false, $checkout->needs_shipping_contact);
    $this->assertStringStartsWith("https://pay.conekta", $checkout->url);
    $this->assertStringEndsWith($checkout->slug, $checkout->url);
    $this->assertTrue(strlen($checkout->id) == 36);
    $this->assertTrue($checkout->monthly_installments_enabled);
    $this->assertEquals([3, 6, 12], (array) $checkout->monthly_installments_options);

    return $checkout;
  }

  public function testSuccesfulCheckoutCreateWithRecurrent()
  {
    self::$validCheckout['name'] = 'Payment Link Name Rec' . time();
    self::$validCheckout['expired_at'] = static::getExpiredAt();
    self::$validCheckout['recurrent'] = true;
    self::$validCheckout['payments_limit_count'] = 3;
    $checkout = Checkout::create(self::$validCheckout);
    $this->assertTrue(strpos(get_class($checkout), 'Checkout') !== false);
    $this->assertEquals(false, $checkout->livemode);
    $this->assertEquals(true, $checkout->recurrent);
    $this->assertEquals(3, $checkout->payments_limit_count);
    $this->assertEquals(self::$validCheckout['name'], $checkout->name);
    $this->assertEquals(false, $checkout->needs_shipping_contact);
    $this->assertStringStartsWith("https://pay.conekta", $checkout->url);
    $this->assertStringEndsWith($checkout->slug, $checkout->url);
    $this->assertTrue(strlen($checkout->id) == 36);
  }

  public function testSuccessfulCheckoutNewWhere()
  {
    $checkouts = Checkout::where();
    $this->assertTrue(strpos(get_class($checkouts), 'ConektaList') !== false);
    $this->assertTrue(strpos($checkouts->elements_type, 'Checkout') !== false);
    $this->assertEquals('Conekta\Checkout', get_class($checkouts[0]));
    $this->assertEquals('Conekta\Checkout', get_class(end($checkouts)));
  }

  public function testSuccesfulFindCheckout()
  {
    $checkout  = $this->testSuccesfulCheckoutCreate();
    $filterCheckout = Checkout::find($checkout->id);
    $this->assertTrue(strpos(get_class($filterCheckout), 'Checkout') !== false);
  }

  public function testSuccesfulSendEmail()
  {
    $checkout  = $this->testSuccesfulCheckoutCreate();
    $checkout->sendEmail(array('email' => 'mail@mail.com'));

    $this->assertTrue(strpos(get_class($checkout), 'Checkout') !== false);
    $this->assertEquals(1, $checkout->emails_sent);
  }

  public function testSuccesfulCancel()
  {
    $checkout  = $this->testSuccesfulCheckoutCreate();
    $checkout->cancel();

    $this->assertTrue(strpos(get_class($checkout), 'Checkout') !== false);
    $this->assertEquals('Cancelled', $checkout->status);
  }

  public function testUnsuccesfulSendSms()
  {
    $checkout  = $this->testSuccesfulCheckoutCreate();
    try {
      $checkout->sendSms(array('phone' => '555555555'));
    } catch (\Exception $e) {
      $this->assertTrue(strpos($e->getMessage(),"Las notificaciones sms no estan activas.") !== false);
    }
  }

  public function testUnsuccesfulCheckoutCreate()
  {
    try {
      $checkout = Checkout::create(self::$invalidCheckout);
    } catch (\Exception $e) {
      $this->assertTrue(strpos($e->getMessage(),"El parametro \"order_template\" es requerido") !== false);
    }
  }

  public static function getExpiredAt()
  {
    $datetime = new \Datetime();
    $datetime->add(new \DateInterval('P3D'));
    return $datetime->format('U');
  }
}
