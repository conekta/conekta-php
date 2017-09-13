<?php

namespace Conekta;

class ConektaTest extends BaseTest
{
  function setPlugin($plugin){
    Conekta::setPlugin($plugin);
  }

  function setEnvLocale($locale){
    Conekta::setLocale($locale);
  }

  public function testApiLocaleInitializerStyle()
  {
    $this->setEnvLocale('en');
    $this->assertTrue( Conekta::$locale == 'en');
    $this->setEnvLocale('es');
  }

  public function testPluginInitializerStyle()
  {
    $this->setApiKey();
    $this->setPlugin('spree');
    $this->assertTrue( Conekta::$plugin == 'spree');
  }

}