<?php

require_once dirname(__FILE__).'/../lib/Conekta.php';

class BaseTest extends \PHPUnit\Framework\TestCase
{
  public function setApiKey()
  {   
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = 'key_ZLy4aP2szht1HqzkCezDEA';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
  }

  public function setApiVersion($version)
  {
    \Conekta\Conekta::setApiVersion($version);
  }
  
}
