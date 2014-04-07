<?php
class Conekta_Plan extends Conekta_Resource
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
	
	public static function where($params=null) {
		$class = get_called_class();
		return self::_scpWhere($class, $params);
	}
	
	public function delete() {
		return self::_delete();
	}
	
	public function update($params=null)
	{
		return self::_update($params);
	}	
	
	/**
	 * @deprecated
	 */
	public static function retrieve($id)
	{
		$class = get_called_class();
		return self::_scpFind($class, $id);
	}
	
	public static function all($params=null) {
		$class = get_called_class();
		return self::_scpWhere($class, $params);
	}
}
?>
