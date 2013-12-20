<?php
class Conekta_Customer extends Conekta_Resource
{
	
	public function loadFromArray($values) {
		parent::loadFromArray($values);
		foreach ($this->cards as $k => $v) {
			if (isset($v->deleted) != true) {
				$v->customer = &$this;
				$this->cards[$k] = $v;
			}
		}
		
		if (isset($this->subscription)) {
			$this->subscription = &$this;
		}
	}
	
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
	
	public function createCard($params=null)
	{
		return self::_createMember('cards', $params);
	}
	
	public function createSubscription($params=null)
	{
		return self::_createMember('subscription', $params);
	}
}
?>
