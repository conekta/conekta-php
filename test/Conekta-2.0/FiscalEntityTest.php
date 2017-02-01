<?php

class FiscalEntityTest extends UnitTestCase
{
    public static $valid_customer = array(
        'cards' => array('tok_test_visa_4242'),
        'name' => 'Test Name',
        'email' => 'test@conekta.io',
        'fiscal_entities' => array(array(
            'tax_id' => 'AMGH851205MN1',
            'name' => 'Test SA de CV',
            'email' => 'test@conekta.io',
            'phone' => '+5213353319758',
            'address' => array(
                'street1' => '250 Alexis St',
                'internal_number' => "19",
                'external_number' => '10',
                'city' => 'Red Deer',
                'state' => 'Alberta',
                'country' => 'MX',
                'postal_code' => '78216'
            )
        ))
    );

    public function testSuccessfulFiscalEntityDelete()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);

        $fiscal_entity = $customer->fiscal_entities[0]->delete();

        $this->assertTrue($fiscal_entity->deleted);
    }

    public function testSuccessfulFiscalEntityUpdate()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);

        $customer->fiscal_entities[0]->update(array(
            'ame' => 'Another name'
        ));

        $this->assertTrue($customer->fiscal_entities[0]->name == 'Another name');
    }

    public function testUnsuccessfulFiscalEntityUpdate()
    {
        setApiKey();
        $customer = \Conekta\Customer::create(self::$valid_customer);

        try {
            $customer->fiscal_entities[0]->update(array(
                'name' => 'Company name'
            ));
        } catch (Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ErrorList') == true);
        }
    }
}
