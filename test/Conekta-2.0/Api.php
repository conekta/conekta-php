<?php

use PHPUnit\Framework\TestCase;

require_once dirname(__FILE__).'/../../lib/Conekta.php';

class Api extends TestCase
{

  function setApiKey()
  {   
    $apiEnvKey = getenv('CONEKTA_API');
    if (!$apiEnvKey) {
      $apiEnvKey = 'SN2vakDK6CrWATiRWCyoZw';
    }
    \Conekta\Conekta::setApiKey($apiEnvKey);
  }
  function unsetApiKey()
  {
    if (isset($env) == false) {
      $env = \Conekta\Conekta::setApiKey('');
    }
  }
  function setApiVersion($version)
  {
    \Conekta\Conekta::setApiVersion($version);
  }

  function setPlugin($plugin){
    \Conekta\Conekta::setPlugin($plugin);
  }

  function setEnvLocale($locale){
    \Conekta\Conekta::setLocale($locale);
  }

  function exceptionErrorHandler($errNo, $errStr, $errFile, $errLine)
  {
    throw new ErrorException($errStr, $errNo, 0, $errFile, $errLine);
  }

}
