<?php

namespace Conekta;

class ConektaTest extends BaseTest
{
    public function setEnvLocale($locale)
    {
        Conekta::setLocale($locale);
    }
    public function setPlugin($plugin)
    {
        Conekta::setPlugin($plugin);
    }
    public function setPluginVersion($version)
    {
        Conekta::setPluginVersion($version);
    }

    public function testApiLocaleInitializerStyle()
    {
        $this->setEnvLocale('en');
        $this->assertTrue(Conekta::$locale == 'en');
        $this->setEnvLocale('es');
    }

    public function testPluginInitializerStyle()
    {
        $this->setApiKey();
        $this->setPlugin('Magento 2');
        $this->setPluginVersion('2.0.0');
        $this->assertTrue(Conekta::getPlugin() == 'Magento 2');
        $this->assertTrue(Conekta::getPluginVersion() == '2.0.0');
    }
}
