<?php

use \Conekta\Lang;
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class LangTest extends TestCase
{   
	public function testShouldTranslatesMessage()
	{
		$langEnTest = Lang::translate('error.resource.id_purchaser', Lang::EN);
		$langEsTest = Lang::translate('error.resource.id_purchaser', Lang::ES);
		$langEnOut  = 'There was an error. Please contact system administrator.';
		$langEsOut  = 'Hubo un error. Favor de contactar al administrador del sistema.';
		$this->assertTrue( $langEnTest == $langEnOut);
		$this->assertTrue( $langEsTest == $langEsOut);
	}
}