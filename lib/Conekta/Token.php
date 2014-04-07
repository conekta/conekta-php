<?php
class Conekta_Token extends Conekta_Resource
{
	public static function find($id)
	{
		$class = get_called_class();
		return self::_scpFind($class, $id);
	}
	
	public static function create($params=null)
	{
		$class = get_called_class();
		return self::_scpCreate($class, $params);
	}
	
	/**
	 * @deprecated
	 */
	public static function retrieve($id)
	{
		$class = get_called_class();
		return self::_scpFind($class, $id);
	}
}
?>
