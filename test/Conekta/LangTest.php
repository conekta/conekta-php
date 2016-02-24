<?php

class Conekta_LangTest extends UnitTestCase
{
    public function testShouldTranslatesMessage()
    {
        $this->assertEqual(
            'There was an error. Please contact system administrator.',
            Conekta_Lang::translate('error.resource.id_purchaser', null, Conekta_Lang::EN)
        );

        $this->assertEqual(
            'Hubo un error. Favor de contactar al administrador del sistema.',
            Conekta_Lang::translate('error.resource.id_purchaser', null, Conekta_Lang::ES)
        );
    }
}
