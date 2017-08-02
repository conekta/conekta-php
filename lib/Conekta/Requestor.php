<?php

namespace Conekta;

use \Conekta\Conekta;
use \Conekta\Exceptions;

class Requestor
{
  public $apiKey;

  public function __construct()
  {
    $this->apiKey = Conekta::$apiKey;
    $this->apiVersion = Conekta::$apiVersion;
    $this->plugin = Conekta::$plugin;
  }

  public static function apiUrl($url = '')
  {
    $apiBase = Conekta::$apiBase;

    return $apiBase . $url;
  }

  private function additionalHeaders()
  {
    $userAgentPlugin = array(
      'plugin_name' => Conekta::getPlugin(),
      'plugin_version' => Conekta::getPluginVersion()
    );
    return $userAgentPlugin;
  }
  private function setHeaders()
  {
    $pluginsAgent = $this->additionalHeaders();
    $userAgent = array(
      'bindings_version' => Conekta::VERSION,
      'lang'             => 'php',
      'lang_version'     => phpversion(),
      'publisher'        => 'conekta',
      'uname'            => php_uname(),
      );

    if(array_filter($pluginsAgent)){
      $userAgent = array_merge($userAgent, $pluginsAgent);
    }

    if(strlen($this->plugin) > 0){
      $userAgent = array_merge($userAgent, array('plugin' => $this->plugin));
    }

    $headers = array(
      'Accept: application/vnd.conekta-v'.Conekta::$apiVersion.'+json',
      'Accept-Language: '.Conekta::$locale,
      'X-Conekta-Client-User-Agent: '.json_encode($userAgent),
      'User-Agent: Conekta/v1 PhpBindings/'.Conekta::VERSION,
      'Authorization: Basic '.base64_encode($this->apiKey.':'),
      'Content-Type: application/json'
      );

    return $headers;
  }

  public function request($method, $url, $params = null)
  {
    $jsonParams = json_encode($params);
    $headers = $this->setHeaders();
    $curl = curl_init();
    $method = strtolower($method);
    $opts = array();

    switch ($method) {
      case 'get':
      $opts[CURLOPT_HTTPGET] = 1;
      $url = $this->buildQueryParamsUrl($url, $params);
      break;
      case 'post':
      $opts[CURLOPT_POST] = 1;
      $opts[CURLOPT_POSTFIELDS] = $jsonParams;
      break;
      case 'put':
      $opts[CURLOPT_RETURNTRANSFER] = 1;
      $opts[CURLOPT_CUSTOMREQUEST] = 'PUT';
      $opts[CURLOPT_POSTFIELDS] = $jsonParams;
      break;
      case 'delete':
      $opts[CURLOPT_CUSTOMREQUEST] = 'DELETE';
      $url = $this->buildSegementParamsUrl($url, $params);
      break;
      default:
      throw new Exception('Wrong method');
    }

    $url = $this->apiUrl($url);
    $opts[CURLOPT_URL] = $url;
    $opts[CURLOPT_RETURNTRANSFER] = true;
    $opts[CURLOPT_CONNECTTIMEOUT] = 30;
    $opts[CURLOPT_TIMEOUT] = 80;
    $opts[CURLOPT_RETURNTRANSFER] = true;
    $opts[CURLOPT_HTTPHEADER] = $headers;
    $opts[CURLOPT_CAINFO] = dirname(__FILE__).'/../ssl_data/ca_bundle.crt';
    curl_setopt_array($curl, $opts);
    $response = curl_exec($curl);
    $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    $jsonResponse = json_decode($response, true);

    if ($responseCode != 200) {
      throw Handler::errorHandler($jsonResponse, $responseCode);
    }

    return $jsonResponse;
  }

  private function buildQueryParamsUrl($url, $params)
  {
    if(!is_null($params)){
      $params = http_build_query($params);
      $url = $url.'?'.$params;
    }

    return $url;
  }

  private function buildSegementParamsUrl($url, $params)
  {
    if(!is_array($params)){
      $url = $url.urlencode($params);
    }

    return $url;
  }
}
