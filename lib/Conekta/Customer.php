<?php
class Conekta_Customer extends Conekta_Resource
{
	
	public function loadFromArray($values) {
		parent::loadFromArray($values);
		foreach ($this->cards as $card) {
			$card->customer = $this;
		}
		
		if (isset($this->subscription)) {
			$this->subscription = $this;
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
}
?>
