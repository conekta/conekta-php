<?php
class Conekta_Card extends Conekta_Resource
{	
	public function instanceUrl() 
	{
		$id = $this->id;
		if (!$id) 
		{
			throw new Exception('No id');
		}
		$class = get_class($this);
		$base = $this->classUrl($class);
		$extn = urlencode($id);
		$customerUrl = $this->customer->instanceUrl();
		return "$customerUrl$base/$extn";  
	}
	
	public function update($params=null)
	{
		return self::_update($params);
	}
	
	public function delete() {
		return self::_delete('customer', 'cards');
	}
}
?>
