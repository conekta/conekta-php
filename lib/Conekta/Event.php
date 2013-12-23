<?php
class Conekta_Event extends Conekta_Resource
{	
	public static function where($params) {
		$class = get_class();
		return self::_scpWhere($class, $params);
	}
}
?>
