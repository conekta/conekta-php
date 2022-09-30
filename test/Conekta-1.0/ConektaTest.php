<?php

namespace Conekta;

class ConektaTest extends BaseTest
{
    public function testApiLocaleInitializerStyle()
    {
        $this->setEnvLocale('en');
        $this->assertTrue(Conekta::$locale == 'en');
        $this->setEnvLocale('es');
    }

    public function setEnvLocale($locale)
    {
        Conekta::setLocale($locale);
    }

    public function testPluginInitializerStyle()
    {
        $this->setApiKey();
        $this->setPlugin('spree');
        $this->assertTrue(Conekta::$plugin == 'spree');
    }

    public function setPlugin($plugin)
    {
        Conekta::setPlugin($plugin);
    }
}
