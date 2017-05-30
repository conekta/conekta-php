<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class ConektaTest extends TestCase
{
  function setPlugin($plugin){
    \Conekta\Conekta::setPlugin($plugin);
  }
  function setApiKey()
  {
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
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