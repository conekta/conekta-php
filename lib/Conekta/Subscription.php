<?php
class Conekta_Subscription extends Conekta_Resource
{	
	public function instanceUrl() 
	{
		$id = $this->id;
		if (!$id) 
		{
			throw new Conekta_Error(
			LANG::translate('error.resource.id', array('RESOURCE'=>get_class()), LANG::EN),
			LANG::translate('error.resource.id_purchaser', null, Conekta::$locale)
			);
		}
		$class = get_class($this);
		$base = '/subscription';
		$customerUrl = $this->customer->instanceUrl();
		return "$customerUrl$base";  
	}
	
	public function update($params=null)
	{
		return self::_update($params);
	}
	
	public function cancel()
	{
		return self::_customAction('post', 'cancel');
	}
	
	public function pause()
	{
		return self::_customAction('post', 'pause');
	}
	
	public function resume()
	{
		return self::_customAction('post', 'resume');
	}
}
?>
