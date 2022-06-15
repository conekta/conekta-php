<?php

namespace Conekta;

class Charge extends ConektaResource
{
    public string $livemode = '';
    public string $amount = '';
    public string $createdAt = '';
    public string $currency = '';
    public string $description = '';
    public string $referenceId = '';
    public string $failureCode = '';
    public string $failureMessage = '';
    public string $fee = '';
    public string $monthlyInstallments = '';
    public string $deviceFingerprint = '';
    public string $status = '';
    public string $exchangeRate = '';
    public string $foreignCurrency = '';
    public string $amountInForeignCurrency = '';
    public string $checkoutId = '';
    public string $checkoutOrderCount = '';

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
