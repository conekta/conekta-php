<?php

namespace Conekta;

class Charge extends ConektaResource
{
     public $livemode = '';
     public $amount = '';
     public $createdAt = '';
     public $currency = '';
     public $description = '';
     public $referenceId = '';
     public $failureCode = '';
     public $failureMessage = '';
     public $fee = '';
     public $monthlyInstallments = '';
     public $deviceFingerprint = '';
     public $status = '';
     public $exchangeRate = '';
     public $foreignCurrency = '';
     public $amountInForeignCurrency = '';
     public $checkoutId = '';
     public $checkoutOrderCount = '';

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        }
    }

    public function __isset($property)
    {
        return isset($this->{$property});
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
            $params = ['amount' => $amount];
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
