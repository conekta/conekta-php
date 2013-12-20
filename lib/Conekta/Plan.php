<?php
class Conekta_Plan extends Conekta_Resource
{
	public static function get($id)
	{
		$class = get_class();
		return self::_scpGet($class, $id);
	}
	
	public static function create($params=null)
	{
		$class = get_class();
		return self::_scpCreate($class, $params);
	}
	
	public function update($params=null)
	{
		return self::_update($params);
	}	
}
?>
