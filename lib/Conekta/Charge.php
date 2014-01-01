<?php
class Conekta_Charge extends Conekta_Resource
{	
	public static function get($id)
	{
		$class = get_class();
		return self::_scpGet($class, $id);
	}
	
	public static function where($params=null) {
		$class = get_class();
		return self::_scpWhere($class, $params);
	}
	
	public static function create($params=null)
	{
		$class = get_class();
		return self::_scpCreate($class, $params);
	}
	
	public function capture()
	{
		return self::_customAction('post', 'capture', null);
	}
	
	public function refund($amount=null)
	{
		$params = null;
		if (isset($amount)) {
			$params = array('amount'=>$amount);
		}
		return self::_customAction('post', 'refund', $params);
	}
}
?>
