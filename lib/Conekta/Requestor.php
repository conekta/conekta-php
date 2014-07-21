<?php
class Conekta_Requestor
{
	public $apiKey;
	
	public function __construct()
	{
		$this->apiKey = Conekta::$apiKey;
	}
	
	public static function apiUrl($url='')
	{
		$apiBase = Conekta::$apiBase;
		return "$apiBase$url";
	}
	
	private function setHeaders()
	{
		$user_agent = array('bindings_version' => Conekta::VERSION,
		'lang' => 'php',
		'lang_version' => phpversion(),
		'publisher' => 'conekta',
		'uname' => php_uname());
		$headers = array('Accept: application/vnd.conekta-v' . Conekta::$apiVersion . '+json',
		'Accept-Language: ' . Conekta::$locale,
		'X-Conekta-Client-User-Agent: ' . json_encode($user_agent),
		'User-Agent: Conekta/v1 PhpBindings/' . Conekta::VERSION,
		'Authorization: Basic ' . base64_encode($this->apiKey . ':' ));
		return $headers;
	}
	
	public function request($meth, $url, $params=null)
	{
		$params = self::encode($params);
		$headers = $this->setHeaders();
		$curl = curl_init();
		$meth = strtolower($meth);
		$opts = array();
		$query = "";
		if (count($params) > 0)
		{
			$query = '?'.$params;
		}
		switch($meth) 
		{
			case 'get':
				$opts[CURLOPT_HTTPGET] = 1;
				$url = $url.$query;
				break;
			case 'post':
				$opts[CURLOPT_POST] = 1;
				$opts[CURLOPT_POSTFIELDS] = $params;
				break;
			case 'put':
				$opts[CURLOPT_RETURNTRANSFER] = 1;
				$opts[CURLOPT_CUSTOMREQUEST] = 'PUT';
				$opts[CURLOPT_POSTFIELDS] = $params;
				break;
			case 'delete':
				$opts[CURLOPT_CUSTOMREQUEST] = 'DELETE';
				$url = $url.$query;
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
		$opts[CURLOPT_CAINFO] = dirname(__FILE__) . '/../ssl_data/ca_bundle.crt';
		curl_setopt_array($curl, $opts);
		$response = curl_exec($curl);
		$response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		if ($response_code != 200) {
			Conekta_Error::errorHandler($response, $response_code);
		}
		return json_decode($response, true);
	}
	
	public static function encode($arr, $prefix=null)
	{
		if (!is_array($arr)) {
			return $arr;
		}
		$r = array();
		foreach ($arr as $k => $v) {
			if (is_null($v)) {
				continue;
			}

			if ($prefix && $k && !is_int($k)) {
				$k = $prefix."[".$k."]";
			}
			else if ($prefix) {
				$k = $prefix."[]";
			}

			if (is_array($v)) {
				$r[] = self::encode($v, $k, true);
			} else {
				if (is_bool($v)) {
					$v = $v ? 'true' : 'false';
				}
				$r[] = urlencode($k)."=".urlencode($v);
			}
		}
		return implode("&", $r);
	}
}
?>
