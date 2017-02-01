<?php

class ConektaTest extends UnitTestCase
{

    public function testApiLocaleInitializerStyle()
    {
        setEnvLocale('en');
        $this->assertTrue( \Conekta\Conekta::$locale == 'en');
    }

    public function testPluginInitializerStyle()
    {
        setApiKey();
        setPlugin('spree');
        $this->assertTrue( \Conekta\Conekta::$plugin == 'spree');
    }

}