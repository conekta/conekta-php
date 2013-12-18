<?php
abstract class Conekta_Resource extends Conekta_Object
{	
	public static function classUrl($class=null) 
	{
		if (!$class)
		{
			$class = get_class($this);
		}
		$base = str_replace("conekta_", "", strtolower($class));
		return "/${base}s";
	}
	
	protected static function _scpGet($class, $id) 
	{
		$instance = new $class($id);
		$requestor = new Conekta_Requestor();
		$url = $instance->instanceUrl();
		$response = $requestor->request('get', $url);
		$instance->loadFrom($response);
		return $instance;
	}
	
	protected static function _scpCreate($class,$params) 
	{
		$requestor = new Conekta_Requestor();
		$url = self::classUrl($class);
		$response = $requestor->request('post', $url, $params);
		$instance = new $class();
		$instance->loadFrom($response);
		return $instance;
	}
	
	public function instanceUrl() 
	{
		$id = $this->_values['id'];
		if (!$id) 
		{
			throw new Exception('No id');
		}
		$class = get_class($this);
		$base = $this->classUrl($class);
		$extn = urlencode($id);
		return "$base/$extn";  
	}
	
	public function loadFrom($values)
	{
		foreach ($values as $k => $v) {
			$this->$k =  $v;
			$this->_setVal($k,$v);
		}
	}
	
	protected function _scpDelete() 
	{
	}
	
	protected function _scpUpdate() 
	{
	}
	
	protected function _scpModifyMember() 
	{
	}
	
	protected function _scpCreateMember() 
	{
	}
}
?>
