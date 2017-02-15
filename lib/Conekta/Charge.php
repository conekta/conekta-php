<?php

namespace Conekta;

use \Conekta\Resource;

class Charge extends Resource
{
    var $livemode                   = "";
    var $amount                     = "";
    var $created_at                 = "";
    var $currency                   = "";
    var $description                = "";
    var $reference_id               = "";
    var $failure_code               = "";
    var $failure_message            = "";
    var $fee                        = "";
    var $monthly_installments       = "";
    var $device_fingerprint         = "";
    var $status                     = "";
    var $exchange_rate              = "";
    var $foreign_currency           = "";
    var $amount_in_foreign_currency = "";
    var $checkout_id                = "";
    var $checkout_order_count       = "";

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function  __isset($property)
    {
        return isset($this->$property);
    }

    public static function find($id)
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }

    public static function where($params = null)
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }

    public static function create($params = null)
    {
        $class = get_called_class();

        return parent::_scpCreate($class, $params);
    }

    public function capture()
    {
        return parent::_customAction('post', 'capture', null);
    }

    public function refund($amount = null)
    {
        $params = null;
        if (isset($amount)) {
            $params = array('amount' => $amount);
        }

        return parent::_customAction('post', 'refund', $params);
    }

    /**
     * @deprecated
     */
    public static function retrieve($id)
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }

    public static function all($params = null)
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }
}
