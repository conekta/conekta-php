<?php

namespace Conekta;

class PayoutTest extends BaseTest
{
    public function testSuccesfulGetPayout()
    {
        $this->markTestSkipped("Return Error:  Third party payouts are disable, please contact your account manager.");
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $payee = Payee::create([
            'name'            => 'John Doe',
            'email'           => 'j_d@radcorp->com',
            'phone'           => '555555555',
            'bank'            => [
                'account_number'        => '032180000118359719',
                'account_holder'        => 'J D - Radcorp',
                'description'           => 'Conekta To JD',
                'statement_description' => 'Conekta To JD 111111111',
                'statement_reference'   => '111111111',
            ],
            'billing_address' => [
                'company_name' => 'Rad Corp',
                'tax_id'       => 'tax121212abc',
                'street1'      => 'Guadalupe 73',
                'street2'      => 'Despacho 32',
                'street3'      => 'Condesa',
                'city'         => 'Cuauhtemoc',
                'state'        => 'DF',
                'country'      => 'MX',
                'zip'          => '06100',
            ],
        ]);

        $this->assertTrue(strpos(get_class($payee), 'Payee') !== false);
        $this->assertTrue(strpos('555555555', $payee->phone) !== false);
        $this->assertTrue(strpos('032180000118359719', $payee->payout_methods[0]->account_number) !== false);
        $this->assertTrue(strpos('J D - Radcorp', $payee->payout_methods[0]->account_holder) !== false);
        $this->assertTrue(strpos('ixe', $payee->payout_methods[0]->bank) !== false);
        $this->assertTrue(isset($payee->default_payout_method_id));

        $this->assertTrue(strpos('Conekta To JD', $payee->payout_methods[0]->description) !== false);
        $this->assertTrue(
            strpos('Conekta To JD 111111111', $payee->payout_methods[0]->statement_description) !== false
        );
        $this->assertTrue(strpos('111111111', $payee->payout_methods[0]->statement_reference) !== false);
        $this->assertTrue(strpos('Rad Corp', $payee->billing_address->company_name) !== false);
        $this->assertTrue(strpos('tax121212abc', $payee->billing_address->tax_id) !== false);
        $this->assertTrue(strpos('06100', $payee->billing_address->zip) !== false);

        $payout = Payout::create([
            'amount'   => 5000,
            'currency' => 'MXN',
            'payee'    => $payee->id,
        ]);

        $this->assertTrue(strpos(get_class($payout), 'Payout') !== false);
        $this->assertTrue(5000 == $payout->amount);
        $this->assertTrue(strpos('MXN', $payout->currency) !== false);

        $this->assertTrue(strpos('032180000118359719', $payout->method->account_number) !== false);
        $this->assertTrue(strpos('J D - Radcorp', $payout->method->account_holder) !== false);
        $this->assertTrue(strpos('ixe', $payout->method->bank) !== false);
    }
}
