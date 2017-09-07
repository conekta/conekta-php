<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';
require_once dirname(__FILE__).'/../BaseTest.php';

class ConektaTest extends TestCase
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
    BaseTest::setApiKey();
    $this->setPlugin('spree');
    $this->assertTrue( \Conekta\Conekta::$plugin == 'spree');
  }

}