<?php
class Conekta_Subscription extends Conekta_Resource
{	
	public function instanceUrl() 
	{
		$id = $this->id;
		if (!$id) 
		{
			throw new Conekta_Error('Could not get the id of '. get_class() . ' instance.' );
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
