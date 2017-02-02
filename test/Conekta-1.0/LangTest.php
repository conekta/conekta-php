<?php

use \Conekta\Lang;

class LangTest extends UnitTestCase
{
    public function testShouldTranslatesMessage()
    {
        $this->assertEqual(
            'There was an error. Please contact system administrator.',
            Lang::translate('error.resource.id_purchaser', Lang::EN)
        );

        $this->assertEqual(
            'Hubo un error. Favor de contactar al administrador del sistema.',
            Lang::translate('error.resource.id_purchaser', Lang::ES)
        );
    }
}
