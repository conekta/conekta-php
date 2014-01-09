<?php
class Conekta_Object extends ArrayObject
{
	
	protected $_values;
	
	public function __construct($id=null)
	{
		$this->_values = array();
		$this->id = $id;
	}
	
	public function _setVal($k,$v)
	{
		$this->_values[$k] = $v;
	}
	
	public function _unsetKey($k)
	{
		unset($this->_values[$k]);
	}
	
	public function loadFromArray($values)
	{
		foreach ($values as $k => $v) {
			if (is_array($v)) {
				$v = Conekta_Util::convertToConektaObject($v);
			}
			if (strpos(get_class($this), "Conekta_Object") !== false) {
				$this[$k] = $v;
			} else {
				$this->$k = $v;
			}
			$this->_setVal($k,$v);
		}
	}
	
	public function __toJSON()
	{
		if (defined('JSON_PRETTY_PRINT')) 
		{
			return json_encode($this->_toArray(), JSON_PRETTY_PRINT);
		} 
		else 
		{
			return json_encode($this->_toArray());
		}
	}
	
	protected function _toArray() {
		$array = array();
		foreach ($this->_values as $k => $v) {
			if (is_object($v) == true && strpos(get_class($v), "Conekta_") !== false) {
				if (empty($v->_values) != true) {
					$array[$k] = $v->_toArray();
				}
			} else {
				$array[$k] = $v;
			}
		}
		return $array;
	}
	
	public function __toString()
	{
		return $this->__toJSON();
	}
	
	//public function shiftArray($array, $k) {
		//unset($array[$k]);
		//end($array);
		//$lastKey = key($array);
		
		//for ($i = $k; $i < $lastKey; ++ $i) {
			//$array[$i] = $array[$i+1];
			//unset($array[$i+1]);
		//}
		
		//return $array;
	//}
}
?>
