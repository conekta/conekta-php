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
	
	protected static function _scpWhere($class, $params)
	{
		$instance = new Conekta_Object();
		$requestor = new Conekta_Requestor();
		$url = self::classUrl($class);
		$response = $requestor->request('get', $url, $params);
		$instance->loadFromArray($response);
		return $instance;
	}
	
	protected static function _scpFind($class, $id) 
	{
		$instance = new $class($id);
		$requestor = new Conekta_Requestor();
		$url = $instance->instanceUrl();
		$response = $requestor->request('get', $url);
		$instance->loadFromArray($response);
		return $instance;
	}
	
	protected static function _scpCreate($class,$params) 
	{
		$requestor = new Conekta_Requestor();
		$url = self::classUrl($class);
		$response = $requestor->request('post', $url, $params);
		$instance = new $class();
		$instance->loadFromArray($response);
		return $instance;
	}
	
	public function instanceUrl() 
	{
		$id = $this->id;
		if (!$id) 
		{
			throw new Conekta_Error('Could not get the id of '. get_class() . ' instance.' );
		}
		$class = get_class($this);
		$base = $this->classUrl($class);
		$extn = urlencode($id);
		return "$base/$extn";  
	}
	
	protected function _delete($parent=null, $member=null) 
	{
		self::_customAction('delete', null, null);
		if (isset($parent) && isset($member)) {
			$obj = $this->$parent->$member;
			if (strpos(get_class($obj), "Conekta_Object") !== false) {
				$continue = false;
				foreach ($this->$parent->$member as $k => $v) {
					if (strpos($v->id, $this->id) !== false) {
						$this->$parent->$member->_values = Conekta_Util::shiftArray($this->$parent->$member->_values,$k);
						$this->$parent->$member->loadFromArray($this->$parent->$member->_values);
						$continue = true;
						$unset = count($this->$parent->cards)-1;
						continue ;
					}
				}
				if ($continue) {
					$this->$parent->$member->offsetUnset(count($this->$parent->cards)-1);
				}
			} else {
				unset($this->$parent->$member);
			}
		}
		return $this;
	}
	
	protected function _update($params) 
	{
		$requestor = new Conekta_Requestor();
		$url = $this->instanceUrl();
		$response = $requestor->request('put', $url, $params);
		$this->loadFromArray($response);
		return $this;
	}
	
	protected function _createMember($member,$params) 
	{
		$requestor = new Conekta_Requestor();
		$url = $this->instanceUrl() . '/' . $member;
		$response = $requestor->request('post', $url, $params);
		if (strpos(get_class($this->$member), "Conekta_Object") !== false) {
			$this->$member->loadFromArray(array_merge($this->$member->_toArray(), array($response)));
			$this->loadFromArray();
			$instances = $this->$member;
			$instance = end($instances);
		} else {
			echo $member;
			if (strpos($member,'cards') !== false) {
				$class = 'Conekta_Card';
			} else {
				$class = 'Conekta_' . ucfirst($member);
			}
			$instance = new $class();
			$instance->loadFromArray($response);
			$this->$member = $instance;
			$this->_setVal($member, $instance);
			$this->loadFromArray();
		}
		return $instance;
	}
	
	protected function _customAction($method='post', $action=null, $params=null) 
	{
		$requestor = new Conekta_Requestor();
		if (isset($action)) {
			$url = $this->instanceUrl() . '/' . $action;
		} else {
			$url = $this->instanceUrl();
		}
		$response = $requestor->request($method, $url, $params);
		$this->loadFromArray($response);
		return $this;
	}
}
?>
