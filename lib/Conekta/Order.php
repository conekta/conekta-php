<?php

namespace Conekta;

class Order extends ConektaResource
{
    public $livemode = '';
    public $amount = '';
    public $paymentStatus = '';
    public $customerId = '';
    public $currency = '';
    public $capture = '';
    public $metadata;
    public $createdAt = '';
    public $updatedAt = '';

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
     */
    public static function find($id): mixed
    {
        $class = get_called_class();

        return parent::_scpFind($class, $id);
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

        $submodels = [
            'tax_lines', 'shipping_lines', 'discount_lines', 'line_items', 'charges', 'returns'
        ];

        foreach ($submodels as $submodel) {
            if (isset($values[$submodel])) {
                $submodelList = new ConektaList($submodel);
                $submodelList->loadFromArray($values[$submodel]);
                $this->{$submodel}->_values = $submodelList;
                $this->{$submodel} = $submodelList;

                foreach ($this->{$submodel} as $object => $val) {
                    $val->order = $this;
                }
            } else {
                $this->{$submodel} = new ConektaList($submodel, []);
            }
        }
    }

    /**
     * @param $params
     * @return Order
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function update($params = null): Order
    {
        return parent::_update($params);
    }

    /**
     * @return Order
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function capture(): Order
    {
        return parent::_customAction('put', 'capture', null);
    }

    /**
     * @param array|null $params
     * @return Order
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function void(?array $params = []): Order
    {
        return parent::_customAction('post', 'void', $params);
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
    public function createTaxLine($params = null): mixed
    {
        return parent::_createMemberWithRelation('tax_lines', $params, $this);
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
    public function createShippingLine($params = null): mixed
    {
        return parent::_createMemberWithRelation('shipping_lines', $params, $this);
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
    public function createDiscountLine($params = null): mixed
    {
        return parent::_createMemberWithRelation('discount_lines', $params, $this);
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
    public function createLineItem($params = null): mixed
    {
        return parent::_createMemberWithRelation('line_items', $params, $this);
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
    public function createCharge($params = null): mixed
    {
        return parent::_createMember('charges', $params);
    }

    /**
     * @param $params
     * @return Order
     * @throws ApiError
     * @throws AuthenticationError
     * @throws Handler
     * @throws MalformedRequestError
     * @throws NoConnectionError
     * @throws ParameterValidationError
     * @throws ProcessingError
     * @throws ResourceNotFoundError
     */
    public function refund($params = null): Order
    {
        return parent::_customAction('post', 'refund', $params);
    }
}
