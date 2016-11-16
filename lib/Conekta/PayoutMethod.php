<?php 

namespace Conekta;

use \Conekta\Resource;
use \Conekta\Lang;
use \Conekta\Error;
use \Conekta\Conekta;

class PayoutMethod extends Resource
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
        $base = $this->classUrl($class);
        $extn = urlencode($id);
        $payeeUrl = $this->payee->instanceUrl();

        return $payeeUrl . $base . "/{$extn}";
    }

    public function update($params = null)
    {
        return parent::_update($params);
    }

    public function delete()
    {
        return parent::_delete('payee', 'payout_methods');
    }
}
