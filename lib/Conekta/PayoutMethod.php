<?php namespace Conekta;

class Payout_Method extends Resource
{
    public function instanceUrl()
    {
        $id = $this->id;
        if (!$id) {
            throw new Error(
                \Conekta\Conekta_Lang::translate('error.resource.id', array('RESOURCE' => get_class()), \Conekta\Conekta_Lang::EN),
                \Conekta\Conekta_Lang::translate('error.resource.id_purchaser', null, Conekta::$locale)
            );
        }
        $class = get_class($this);
        $base = $this->classUrl($class);
        $extn = urlencode($id);
        $payeeUrl = $this->payee->instanceUrl();

        return "$payeeUrl$base/$extn";
    }

    public function update($params = null)
    {
        return self::_update($params);
    }

    public function delete()
    {
        return self::_delete('payee', 'payout_methods');
    }
}
