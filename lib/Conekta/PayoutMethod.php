<?php

namespace Conekta;

use Conekta\{Conekta, ConektaResource, Exceptions, Lang};

class PayoutMethod extends ConektaResource
{
    public string $apiVersion;
    public $payee;
    public function instanceUrl()
    {
        $this->apiVersion = Conekta::$apiVersion;
        $id = $this->id;
        parent::idValidator($id);
        $class = get_class($this);
        $base = $this->classUrl($class);
        $extn = urlencode($id);
        $payeeUrl = $this->payee->instanceUrl();

        return $payeeUrl . $base . "/{$extn}";
    }

    public function update($params = null): PayoutMethod
    {
        return parent::_update($params);
    }

    public function delete(): PayoutMethod
    {
        return parent::_delete('payee', 'payout_methods');
    }
}
