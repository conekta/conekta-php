<?php

namespace Conekta;

use \Conekta\Resource;
use \Conekta\Lang;
use \Conekta\Error;
use \Conekta\Conekta;

class PaymentSource extends Resource
{
    public function instanceUrl()
    {
        $this->apiVersion = Conekta::$apiVersion;
        $id = $this->id;
        parent::idValidator($id);

        $class = get_class($this);
        $base = "/payment_sources";
        $extn = urlencode($id);
        $customerUrl = $this->customer->instanceUrl();
        return $customerUrl . $base . "/{$extn}";
    }

    public function update($params = null)
    {
        return parent::_update($params);
    }

    public function delete()
    {
        return parent::_delete('customer', 'payment_sources');
    }
}
