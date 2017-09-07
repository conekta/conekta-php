<?php

require_once dirname(__FILE__).'/../lib/Conekta.php';

class BaseTest
{
  public static function setApiKey()
  {   
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = 'key_ZLy4aP2szht1HqzkCezDEA';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
  }

  public static function setApiVersion($version)
  {
    \Conekta\Conekta::setApiVersion($version);
  }
  
}
