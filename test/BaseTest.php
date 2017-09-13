<?php

namespace Conekta;

use \PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function setApiKey()
    {
        $apiEnvKey = getenv('CONEKTA_API');
        if (!$apiEnvKey) {
            $apiEnvKey = 'key_ZLy4aP2szht1HqzkCezDEA';
        }
        Conekta::setApiKey($apiEnvKey);
    }

    public function setApiVersion($version)
    {
        Conekta::setApiVersion($version);
    }

}
