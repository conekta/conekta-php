<?php
class Conekta_Customer extends Conekta_Resource
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
	
	public function createCard($params=null)
	{
		$class = 'Conekta_Card';
		return self::_scpCreateMember('cards', $params);
	}
}
?>
