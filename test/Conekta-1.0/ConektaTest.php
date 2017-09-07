<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';
require_once dirname(__FILE__).'/../BaseTest.php';

class ConektaTest extends BaseTest
{
  function setPlugin($plugin){
    \Conekta\Conekta::setPlugin($plugin);
  }

  function setEnvLocale($locale){
    \Conekta\Conekta::setLocale($locale);
  }

  public function testApiLocaleInitializerStyle()
  {
    $this->setEnvLocale('en');
    $this->assertTrue( \Conekta\Conekta::$locale == 'en');
    $this->setEnvLocale('es');
  }

  public function testPluginInitializerStyle()
  {
    $this->setApiKey();
    $this->setPlugin('spree');
    $this->assertTrue( \Conekta\Conekta::$plugin == 'spree');
  }

}