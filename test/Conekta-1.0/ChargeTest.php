<?php

namespace Conekta;

class ChargeTest extends BaseTest
{
    public static $valid_payment_method = array(
        'amount'      => 2000,
        'currency'    => 'mxn',
        'description' => 'Some desc',
        'details'=> array(
            'name'=> 'Arnulfo Quimare',
            'phone'=> '403-342-0642',
            'email'=> 'logan@x-men.org',
            'customer'=> array(
                'logged_in'=> true,
                'successful_purchases'=> 14,
                'created_at'=> 1379784950,
                'updated_at'=> 1379784950,
                'offline_payments'=> 4,
                'score'=> 9
            ),
            'line_items'=> array(
                array(
                    'name'=> 'Box of Cohiba S1s',
                    'description'=> 'Imported From Mex.',
                    'unit_price'=> 20000,
                    'quantity'=> 1,
                    'sku'=> 'cohb_s1',
                    'category'=> 'food'
                )
            )
        )
    );

    public static $intvalid_payment_method = array(
        'amount'      => 10,
        'currency'    => 'mxn',
        'description' => 'Some desc',
        'details'=> array(
            'name'=> 'Arnulfo Quimare',
            'phone'=> '403-342-0642',
            'email'=> 'logan@x-men.org',
            'customer'=> array(
                'logged_in'=> true,
                'successful_purchases'=> 14,
                'created_at'=> 1379784950,
                'updated_at'=> 1379784950,
                'offline_payments'=> 4,
                'score'=> 9
            ),
            'line_items'=> array(
                array(
                    'name'=> 'Box of Cohiba S1s',
                    'description'=> 'Imported From Mex.',
                    'unit_price'=> 20000,
                    'quantity'=> 1,
                    'sku'=> 'cohb_s1',
                    'category'=> 'food'
                )
            )
        )
    );

    public static $valid_visa_card = array('card' => 'tok_test_visa_4242');

    public function testSuccesfulWhere()
    {
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $charges = Charge::where();
        $this->assertTrue(strpos(get_class($charges), 'ConektaObject') !== false);
        $this->assertTrue(strpos(get_class($charges[0]), 'Charge') !== false);
    }

    public function testUnsuccesfulPMCreate()
    {
        $pm = self::$intvalid_payment_method;
        $card = self::$valid_visa_card;
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        try {
            $cpm = Charge::create(array_merge($pm, $card));
        } catch (\Exception $e) {
            $this->assertTrue(strpos($e->getMessage(), 'The minimum for card payments is 3 pesos. Check that the amount is in cents as explained in the documentation.') !== false);
        }
    }

    public function testSuccesfulRefund()
    {
        $this->setApiVersion('1.0.0');
        $pm = self::$valid_payment_method;
        $card = self::$valid_visa_card;
        $this->setApiKey();
        $cpm = Charge::create(array_merge($pm, $card));
        $this->assertTrue($cpm->status == 'paid');
        $cpm->refund();
        $this->assertTrue($cpm->status == 'refunded');
    }

    public function testUnsuccesfulRefund()
    {
        $pm = self::$valid_payment_method;
        $card = self::$valid_visa_card;
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $cpm = Charge::create(array_merge($pm, $card));
        $this->assertTrue($cpm->status == 'paid');
        try {
            $cpm->refund(3000);
        } catch (\Exception $e) {
            $this->assertTrue(strpos($e->getMessage(), 'The amount to refund exceeds the charge total') !== false);
        }
    }

    public function testSuccesfulCapture()
    {
        $this->setApiVersion('1.0.0');
        $pm = self::$valid_payment_method;
        $card = self::$valid_visa_card;
        $capture = array('capture' => false);
        $this->setApiKey();
        $cpm = Charge::create(array_merge($pm, $card, $capture));
        $this->assertTrue($cpm->status == 'pre_authorized');
        $cpm->capture();
        $this->assertTrue($cpm->status == 'paid');
    }
}
