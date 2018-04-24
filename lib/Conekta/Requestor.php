<?php

/**
  * @author Conekta
  * @author Conekta Developers <soporte@conekta.com>
  */

namespace Conekta;

use \Conekta\Conekta;
use \Conekta\Handler;

/**
  * @method string  apiUrl($urls string)
  * @method array() additionalPluginHeaders()
  * @method array() setHeaders()
  * @method json    request($method string, $url string, $params array())
  * @method string  buildQueryParamsUrl($url string, $params arraay())
  * @method string  buildSegmentParamsUrl($url string, $params arraay())
  */
class Requestor
{
  public $apiKey;

  public function __construct()
  {
    $this->apiKey = Conekta::$apiKey;
    $this->apiVersion = Conekta::$apiVersion;
    $this->plugin = Conekta::$plugin;
  }

  /**
   * Function apiUrl
   *
   * get Base path of conekta api i.e. https://api.conekta.com
   *
   * @param url (string) endpoint to concatenate
   * @return (string)
   */
  public static function apiUrl($url = '')
  {
    $apiBase = Conekta::$apiBase;

    return $apiBase . $url;
  }

  /**
   * Function additionalPluginHeaders
   *
   * Set headers if is plugin implementation
   *
   * @return (array)
   */
  private function additionalPluginHeaders()
  {
    return array(
      'plugin_name' => Conekta::getPlugin(),
      'plugin_version' => Conekta::getPluginVersion()
    );
  }

  /**
   * Function setHeaders
   *
   * Set Standar headers for library
   *
   * @return (array)
   */
  private function setHeaders()
  {
    $pluginAgent = $this->additionalPluginHeaders();
    $userAgent = array(
      'bindings_version' => Conekta::VERSION,
      'lang'             => 'php',
      'lang_version'     => phpversion(),
      'publisher'        => 'conekta',
      'uname'            => php_uname(),
      );

    if(array_filter($pluginAgent)){
      $userAgent = array_merge($userAgent, $pluginAgent);
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

  /**
   * Function request
   *
   * Make api call 
   *
   * @param method (string) REST action [DELETE,PUT,POST,GET]
   * @param url (string) endpoint to concatenate
   * @param params (array) contains body request 
   * @return (json)
   */
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
      $url = $this->buildSegmentParamsUrl($url, $params);
      break;
      default:
      throw new \Exception('Wrong method');
    }

    $url = $this->apiUrl($url);
    $opts[CURLOPT_URL] = $url;
    $opts[CURLOPT_RETURNTRANSFER] = true;
    $opts[CURLOPT_CONNECTTIMEOUT] = 30;
    $opts[CURLOPT_TIMEOUT] = 80;
    $opts[CURLOPT_RETURNTRANSFER] = true;
    $opts[CURLOPT_HTTPHEADER] = $headers;
    $opts[CURLOPT_SSLVERSION] = 6;
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

  /**
   * Function buildQueryParamsUrl
   *
   * build body request into url 
   *
   * @param url (string) endpoint to concatenate
   * @param params (array) contains body request
   * @return (string)
   */
  private function buildQueryParamsUrl($url, $params)
  {
    if(!is_null($params)){
      $params = http_build_query($params);
      $url = $url.'?'.$params;
    }

    return $url;
  }

  /**
   * Function buildSegmentParamsUrl
   *
   * build body request for DELETE  action
   *
   * @param url (string) endpoint to concatenate
   * @param params (array) contains body request
   * @return (string)
   */
  private function buildSegmentParamsUrl($url, $params)
  {
    if(!is_array($params)){
      $url = $url.urlencode($params);
    }

    return $url;
  }
}
