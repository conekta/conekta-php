<?php
 
use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class ConektaTest extends TestCase
{

  function setEnvLocale($locale){
    \Conekta\Conekta::setLocale($locale);
  }
  function setPlugin($plugin){
    \Conekta\Conekta::setPlugin($plugin);
  }
  function setPluginVersion($version){
    \Conekta\Conekta::setPluginVersion($version);
  }
  function setApiKey()
  {
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = '1tv5yJp3xnVZ7eK67m4h';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
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
    $this->setPlugin('Magento 2');
    $this->setPluginVersion('2.0.0');
    $this->assertTrue( \Conekta\Conekta::getPlugin() == 'Magento 2');
    $this->assertTrue( \Conekta\Conekta::getPluginVersion() == '2.0.0');
  }

}