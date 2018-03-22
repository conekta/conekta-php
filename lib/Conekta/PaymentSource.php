<?php

namespace Conekta;

use \Conekta\ConektaResource;
use \Conekta\Lang;
use \Conekta\Error;
use \Conekta\Conekta;

class PaymentSource extends ConektaResource
{
  const TYPE_CARD = 'card';
  const TYPE_OXXO_RECURRENT = 'oxxo_recurrent';

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

  /**
   * Method for determine if is card
   * @return boolean
   */
  public function isCard()
  {
    return $this['type'] == self::TYPE_CARD;
  }

  /**
   * Method for determine if is oxxo recurrent
   * @return boolean
   */
  public function isOxxoRecurrent()
  {
    return $this['type'] == self::TYPE_OXXO_RECURRENT;
  }

}
