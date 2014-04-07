<?php
class Conekta_Event extends Conekta_Resource
{	
	public static function where($params=null) {
		$class = get_called_class();
		return self::_scpWhere($class, $params);
	}
	
	/**
	 * @deprecated
	 */
	
	public static function all($params=null) {
		$class = get_called_class();
		return self::_scpWhere($class, $params);
	}
}
?>
