<?php

namespace Conekta;

class Customer extends ConektaResource
{
    public $livemode = '';
    public $name = '';
    public $email = '';
    public $phone = '';
    public $defaultShippingContactId = '';
    public $defaultPaymentSourceId = '';
    public $referrer = '';
    public $accountAge = '';
    public $paidTransactions = '';
    public $firstPaidAt = '';
    public $corporate = '';

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

    public function loadFromArray($values = null)
    {
        if (isset($values)) {
            parent::loadFromArray($values);
        }

        if (Conekta::$apiVersion == '2.0.0') {
            $submodels = [
                'payment_sources',
                'shipping_contacts'
            ];
            foreach ($submodels as $submodel) {
                if (isset($values[$submodel])) {
                    $submodel_list = new ConektaList($submodel, $values[$submodel]);
                    $submodel_list->loadFromArray($values[$submodel]);
                    $this->{$submodel}->_values = $submodel_list;
                } else {
                    $submodel_list = new ConektaList($submodel, []);
                }
                $this->{$submodel} = $submodel_list;

                foreach ($this->{$submodel} as $object => $val) {
                    $val->customer = $this;
                }
            }
        } else {
            $submodels = ['cards'];
            foreach ($submodels as $submodel) {
                if (isset($this->{$submodel})) {
                    $submodel_list = $this->{$submodel};

                    foreach ($submodel_list as $object => $val) {
                        if (isset($val->deleted) != true) {
                            $val->customer = $this;
                            $this->{$submodel}->_setVal($object, $val);
                        }
                    }
                }
            }
        }

        if (isset($this->subscription)) {
            $this->subscription->customer = $this;
        }
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

    public function delete()
    {
        return parent::_delete();
    }

    public function update($params = null)
    {
        return parent::_update($params);
    }

    public function createPaymentSource($params = null)
    {
        return parent::_createMemberWithRelation('payment_sources', $params, $this);
    }

    public function createOfflineRecurrentReference($params = null)
    {
        return parent::_createMemberWithRelation('payment_sources', $params, $this);
    }

    public function deletePaymentSourceById($paymentSourceId)
    {
        if (Conekta::$apiVersion == '2.0.0') {
            $currentCustomer = $this;
            $paymentSources = $currentCustomer->payment_sources;
            $index = 0;
            foreach ($paymentSources as $paymentSource) {
                if ($paymentSource->id == $paymentSourceId) {
                    $currentCustomer->payment_sources[$index]->delete();
                } else {
                    $index += 1;
                }
            }
        }
    }

    public function createCard($params = null)
    {
        return parent::_createMemberWithRelation('cards', $params, $this);
    }

    public function createSubscription($params = null)
    {
        return parent::_createMember('subscription', $params);
    }

    public function createShippingContact($params = null)
    {
        return parent::_createMemberWithRelation('shipping_contacts', $params, $this);
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
