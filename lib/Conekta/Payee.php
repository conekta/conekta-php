<?php
class Conekta_Payee extends Conekta_Resource
{
	public function loadFromArray($values=null) {
		if (isset($values)) {
			parent::loadFromArray($values);
		}
		foreach ($this->payout_methods as $k => $v) {
			if (isset($v->deleted) != true) {
				$v->payee = &$this;
				$this->payout_methods[$k] = $v;
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
	
	public function createPayoutMethod($params=null)
	{
		return self::_createMember('payout_methods', $params);
	}
}
?>
