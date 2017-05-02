<?php

namespace Conekta;

use \Conekta\Resource;
use \Conekta\Lang;
use \Conekta\Exceptions;
use \Conekta\Conekta;

class PayoutMethod extends Resource
{
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

  public function update($params = null)
  {
      return parent::_update($params);
  }

  public function delete()
  {
      return parent::_delete('payee', 'payout_methods');
  }
}
