<?php

class ChargeTest extends UnitTestCase
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

    public function testSuccesfulFindCharge()
    {
        $pm = self::$valid_payment_method;
        $card = self::$valid_visa_card;
        setApiKey();
        $cpm = \Conekta\Charge::create(array_merge($pm, $card));
        $this->assertTrue($cpm->status == 'paid');
        $pm = \Conekta\Charge::find($cpm->id);
        $this->assertTrue(strpos(get_class($pm), 'Charge') !== false);
    }

    public function testSuccesfulBankPMCreate()
    {
        $pm = self::$valid_payment_method;
        $bank = array('bank' => array('type' => 'banorte'));
        setApiKey();
        $bpm = \Conekta\Charge::create(array_merge($pm, $bank));
        $this->assertTrue($bpm->payment_method->service_number == "127589");
        $this->assertTrue($bpm->payment_method->service_name == "Conekta");
        $this->assertTrue(intval($bpm->payment_method->reference) > 0);
        $this->assertTrue(is_numeric($bpm->payment_method->expires_at));
        $this->assertTrue($bpm->status == 'pending_payment');
    }

    public function testSuccesfulSpeiPMCreate()
    {
        $pm = self::$valid_payment_method;
        $spei = array('bank' => array('type' => 'spei'));
        setApiKey();
        $bpm = \Conekta\Charge::create(array_merge($pm, $spei));
        $this->assertTrue($bpm->payment_method->bank == "STP");
        $this->assertTrue(intval($bpm->payment_method->clabe) > 0);
        $this->assertTrue(is_numeric($bpm->payment_method->expires_at));
        $this->assertTrue($bpm->status == 'pending_payment');
    }

    public function testSuccesfulCardPMCreate()
    {
        $pm = self::$valid_payment_method;
        $card = self::$valid_visa_card;
        setApiKey();
        $cpm = \Conekta\Charge::create(array_merge($pm, $card));
        $this->assertTrue($cpm->status == 'paid');
    }

    public function testSuccesfulOxxoPMCreate()
    {
        $pm = self::$valid_payment_method;
        $oxxo = array('cash' => array('type' => 'oxxo'));
        setApiKey();
        $opm = \Conekta\Charge::create(array_merge($pm, $oxxo));
        $this->assertTrue(is_numeric($opm->payment_method->expires_at));
        $this->assertTrue($opm->payment_method->store_name == "OXXO");
        $this->assertTrue($opm->status == 'pending_payment');
    }

}
