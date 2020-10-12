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
        $apiBase = getenv('CONEKTA_API_BASE');
        if ($apiBase) {
            Conekta::setApiBase($apiBase);
        }
        Conekta::setApiKey($apiEnvKey);
    }

    public function setApiVersion($version)
    {
        Conekta::setApiVersion($version);
    }

}
