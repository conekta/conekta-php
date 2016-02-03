<?php

class Conekta_Card extends Conekta_Resource
{
    public function instanceUrl()
    {
        $id = $this->id;
        if (!$id) {
            throw new Conekta_Error(
                Conekta_Lang::translate('error.resource.id', array('RESOURCE' => get_class()), Conekta_Lang::EN),
                Conekta_Lang::translate('error.resource.id_purchaser', null, Conekta::$locale)
            );
        }
        $class = get_class($this);
        $base = $this->classUrl($class);
        $extn = urlencode($id);
        $customerUrl = $this->customer->instanceUrl();

        return "$customerUrl$base/$extn";
    }

    public function update($params = null)
    {
        return self::_update($params);
    }

    public function delete()
    {
        return self::_delete('customer', 'cards');
    }
}
