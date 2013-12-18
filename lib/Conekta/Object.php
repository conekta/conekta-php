<?php
class Conekta_Object extends ArrayObject
{
	
	protected $_values;
	
	public function __construct($id=null)
	{
		$this->_values = array();
		$this->_setVal('id',$id);
	}
	
	public function _setVal($k,$v)
	{
		$this->_values[$k] = $v;
	}
	
	public function __toJSON()
	{
		if (defined('JSON_PRETTY_PRINT')) 
		{
			return json_encode($this->_values, JSON_PRETTY_PRINT);
		} 
		else 
		{
			return json_encode($this->_values);
		}
	}
	
	public function __toString()
	{
		return $this->__toJSON();
	}
}
?>
