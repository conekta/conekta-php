<?php 

namespace Conekta;

use \Conekta\Resource;
use \Conekta\Lang;
use \Conekta\Conekta;
use \Conekta\Error;

class Subscription extends Resource
{
    public function instanceUrl()
    {
        $id = $this->id;
        if (!$id) {
            throw new Error(
                Lang::translate('error.resource.id', Lang::EN, array('RESOURCE' => get_class())),
                Lang::translate('error.resource.id_purchaser', Conekta::$locale)
            );
        }
        $class = get_class($this);
        $base = '/subscription';
        $customerUrl = $this->customer->instanceUrl();

        return $customerUrl . $base;
    }

    public function update($params = null)
    {
        return parent::_update($params);
    }

    public function cancel()
    {
        return parent::_customAction('post', 'cancel');
    }

    public function pause()
    {
        return parent::_customAction('post', 'pause');
    }

    public function resume()
    {
        return parent::_customAction('post', 'resume');
    }
}
