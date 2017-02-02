<?php

namespace Conekta;

use \Conekta\Conekta;
use \Conekta\Error;
use \Conekta\ErrorList;

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

    private function setHeaders()
    {
        $user_agent = array(
            'bindings_version' => Conekta::VERSION,
            'lang'             => 'php',
            'lang_version'     => phpversion(),
            'publisher'        => 'conekta',
            'uname'            => php_uname(),
        );

        if(strlen($this->plugin) > 0){
            $user_agent = array_merge($user_agent, array('plugin' => $this->plugin));
        }

        $headers = array(
            'Accept: application/vnd.conekta-v'.Conekta::$apiVersion.'+json',
            'Accept-Language: '.Conekta::$locale,
            'X-Conekta-Client-User-Agent: '.json_encode($user_agent),
            'User-Agent: Conekta/v1 PhpBindings/'.Conekta::VERSION,
            'Authorization: Basic '.base64_encode($this->apiKey.':'),
            'Content-Type: application/json'
        );

        return $headers;
    }

    public function request($method, $url, $params = null)
    {
        $json_params = json_encode($params);
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
            $opts[CURLOPT_POSTFIELDS] = $json_params;
            break;
        case 'put':
            $opts[CURLOPT_RETURNTRANSFER] = 1;
            $opts[CURLOPT_CUSTOMREQUEST] = 'PUT';
            $opts[CURLOPT_POSTFIELDS] = $json_params;
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
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $json_response = json_decode($response, true);

        if ($response_code != 200) {
            if($this->apiVersion == '2.0.0'){
                throw ErrorList::errorHandler($json_response , $response_code);
            }else{
                throw Error::errorHandler($json_response, $response_code);
            }

        }

        return $json_response;
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
