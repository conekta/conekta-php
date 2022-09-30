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

    /**
     * @param $id
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public static function find($id): mixed
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }

    /**
     * @param $params
     * @return ConektaList|ConektaObject
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public static function where($params = null): ConektaList|ConektaObject
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public static function create($params = null): mixed
    {
        $class = get_called_class();

        return parent::_scpCreate($class, $params);
    }

    /**
     * @param $id
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     * @deprecated
     */
    public static function retrieve($id): mixed
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
    }

    /**
     * @param $params
     * @return ConektaList|ConektaObject
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public static function all($params = null): ConektaList|ConektaObject
    {
        $class = get_called_class();

        return parent::_scpWhere($class, $params);
    }

    /**
     * @param $property
     * @return void
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        }
    }

    /**
     * @param $property
     * @return bool
     */
    public function __isset($property)
    {
        return isset($this->{$property});
    }

    /**
     * @param $values
     * @return void
     */
    public function loadFromArray($values = null): void
    {
        if (isset($values)) {
            parent::loadFromArray($values);
        }

        if (Conekta::$apiVersion == '2.0.0') {
            $this->createSubmodelsWithLists($values, [
                'payment_sources',
                'shipping_contacts'
            ]);
        } else {
            $this->createSubmodels([
                'cards'
            ]);
        }

        if (isset($this->subscription)) {
            $this->subscription->customer = $this;
        }
    }

    /**
     * @param $values
     * @param $submodels
     * @return void
     */
    protected function createSubmodelsWithLists($values, $submodels): void
    {
        foreach ($submodels as $submodel) {
            if (isset($values[$submodel])) {
                $submodel_list = new ConektaList($submodel, $values[$submodel]);
                $submodel_list->loadFromArray($values[$submodel]);
            } else {
                $submodel_list = new ConektaList($submodel, []);
            }
            $this->{$submodel} = $submodel_list;

            foreach ($this->{$submodel} as $val) {
                $val->customer = $this;
            }
        }
    }

    /**
     * @param $submodels
     * @return void
     */
    protected function createSubmodels($submodels): void
    {
        foreach ($submodels as $submodel) {
            if (isset($this->{$submodel})) {
                $submodel_list = $this->{$submodel};

                foreach ($submodel_list as $object => $val) {
                    if (!isset($val->deleted)) {
                        $val->customer = $this;
                        $this->{$submodel}->_setVal($object, $val);
                    }
                }
            }
        }
    }

    /**
     * @param $params
     * @return Customer
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): Customer
    {
        return parent::_update($params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function createPaymentSource($params = null): mixed
    {
        return parent::_createMemberWithRelation('payment_sources', $params, $this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function createOfflineRecurrentReference($params = null): mixed
    {
        return parent::_createMemberWithRelation('payment_sources', $params, $this);
    }

    /**
     * @param $paymentSourceId
     * @return void
     */
    public function deletePaymentSourceById($paymentSourceId): void
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

    /**
     * @return Customer
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function delete(): Customer
    {
        return parent::_delete();
    }

    /**
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function createCard($params = null): mixed
    {
        return parent::_createMemberWithRelation('cards', $params, $this);
    }

    /**
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function createSubscription($params = null): mixed
    {
        return parent::_createMember('subscription', $params);
    }

    /**
     * @param $params
     * @return mixed
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function createShippingContact($params = null): mixed
    {
        return parent::_createMemberWithRelation('shipping_contacts', $params, $this);
    }
}
