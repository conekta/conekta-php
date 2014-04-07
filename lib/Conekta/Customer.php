<?php
class Conekta_Customer extends Conekta_Resource
{
	
	public function loadFromArray($values=null) {
		if (isset($values)) {
			parent::loadFromArray($values);
		}
		foreach ($this->cards as $k => $v) {
			if (isset($v->deleted) != true) {
				$v->customer = &$this;
				$this->cards[$k] = $v;
			}
		}
		
		if (isset($this->subscription)) {
			$this->subscription->customer = &$this;
		}
	}
	
	public static function find($id)
	{
		$class = get_called_class();
		return self::_scpFind($class, $id);
	}
	
	public static function where($params=null) {
		$class = get_called_class();
		return self::_scpWhere($class, $params);
	}
	
	public static function create($params=null)
	{
		$class = get_called_class();
		return self::_scpCreate($class, $params);
	}
	
	public function delete() {
		return self::_delete();
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
