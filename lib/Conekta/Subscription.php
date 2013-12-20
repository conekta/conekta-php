<?php
class Conekta_Subscription extends Conekta_Resource
{	
	public function update($params=null)
	{
		return self::_update($params);
	}
	
	public function cancel()
	{
		return self::_delete('customer', 'subscription', 'post', 'cancel');
	}
}
?>
