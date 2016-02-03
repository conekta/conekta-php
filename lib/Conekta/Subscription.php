<?php namespace Conekta;

class Subscription extends Resource
{
    public function instanceUrl()
    {
        $id = $this->id;
        if (!$id) {
            throw new Error(
                \Conekta\Lang::translate('error.resource.id', array('RESOURCE' => get_class()), \Conekta\Lang::EN),
                \Conekta\Lang::translate('error.resource.id_purchaser', null, Conekta::$locale)
            );
        }
        $class = get_class($this);
        $base = '/subscription';
        $customerUrl = $this->customer->instanceUrl();

        return "$customerUrl$base";
    }

    public function update($params = null)
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
