<?php
/**
 * ChargeRequestPaymentMethod
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Conekta API
 *
 * Conekta sdk
 *
 * The version of the OpenAPI document: 2.1.0
 * Contact: engineering@conekta.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.9.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Conekta\Model;

use \ArrayAccess;
use \Conekta\ObjectSerializer;

/**
 * ChargeRequestPaymentMethod Class Doc Comment
 *
 * @category Class
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ChargeRequestPaymentMethod implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'charge_request_payment_method';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => 'string',
        'cancel_url' => 'string',
        'can_not_expire' => 'bool',
        'failure_url' => 'string',
        'product_type' => 'string',
        'success_url' => 'string',
        'cvc' => 'string',
        'exp_month' => 'string',
        'exp_year' => 'string',
        'name' => 'string',
        'number' => 'string',
        'customer_ip_address' => 'string',
        'expires_at' => 'int',
        'monthly_installments' => 'int',
        'token_id' => 'string',
        'payment_source_id' => 'string',
        'contract_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'type' => null,
        'cancel_url' => null,
        'can_not_expire' => null,
        'failure_url' => null,
        'product_type' => null,
        'success_url' => null,
        'cvc' => null,
        'exp_month' => null,
        'exp_year' => null,
        'name' => null,
        'number' => null,
        'customer_ip_address' => null,
        'expires_at' => 'int64',
        'monthly_installments' => 'int8',
        'token_id' => null,
        'payment_source_id' => null,
        'contract_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'type' => false,
        'cancel_url' => false,
        'can_not_expire' => false,
        'failure_url' => false,
        'product_type' => false,
        'success_url' => false,
        'cvc' => false,
        'exp_month' => false,
        'exp_year' => false,
        'name' => false,
        'number' => false,
        'customer_ip_address' => false,
        'expires_at' => false,
        'monthly_installments' => false,
        'token_id' => false,
        'payment_source_id' => false,
        'contract_id' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'type' => 'type',
        'cancel_url' => 'cancel_url',
        'can_not_expire' => 'can_not_expire',
        'failure_url' => 'failure_url',
        'product_type' => 'product_type',
        'success_url' => 'success_url',
        'cvc' => 'cvc',
        'exp_month' => 'exp_month',
        'exp_year' => 'exp_year',
        'name' => 'name',
        'number' => 'number',
        'customer_ip_address' => 'customer_ip_address',
        'expires_at' => 'expires_at',
        'monthly_installments' => 'monthly_installments',
        'token_id' => 'token_id',
        'payment_source_id' => 'payment_source_id',
        'contract_id' => 'contract_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'cancel_url' => 'setCancelUrl',
        'can_not_expire' => 'setCanNotExpire',
        'failure_url' => 'setFailureUrl',
        'product_type' => 'setProductType',
        'success_url' => 'setSuccessUrl',
        'cvc' => 'setCvc',
        'exp_month' => 'setExpMonth',
        'exp_year' => 'setExpYear',
        'name' => 'setName',
        'number' => 'setNumber',
        'customer_ip_address' => 'setCustomerIpAddress',
        'expires_at' => 'setExpiresAt',
        'monthly_installments' => 'setMonthlyInstallments',
        'token_id' => 'setTokenId',
        'payment_source_id' => 'setPaymentSourceId',
        'contract_id' => 'setContractId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'cancel_url' => 'getCancelUrl',
        'can_not_expire' => 'getCanNotExpire',
        'failure_url' => 'getFailureUrl',
        'product_type' => 'getProductType',
        'success_url' => 'getSuccessUrl',
        'cvc' => 'getCvc',
        'exp_month' => 'getExpMonth',
        'exp_year' => 'getExpYear',
        'name' => 'getName',
        'number' => 'getNumber',
        'customer_ip_address' => 'getCustomerIpAddress',
        'expires_at' => 'getExpiresAt',
        'monthly_installments' => 'getMonthlyInstallments',
        'token_id' => 'getTokenId',
        'payment_source_id' => 'getPaymentSourceId',
        'contract_id' => 'getContractId'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const PRODUCT_TYPE_KLARNA_BNPL = 'klarna_bnpl';
    public const PRODUCT_TYPE_CREDITEA_BNPL = 'creditea_bnpl';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getProductTypeAllowableValues()
    {
        return [
            self::PRODUCT_TYPE_KLARNA_BNPL,
            self::PRODUCT_TYPE_CREDITEA_BNPL,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('cancel_url', $data ?? [], null);
        $this->setIfExists('can_not_expire', $data ?? [], null);
        $this->setIfExists('failure_url', $data ?? [], null);
        $this->setIfExists('product_type', $data ?? [], null);
        $this->setIfExists('success_url', $data ?? [], null);
        $this->setIfExists('cvc', $data ?? [], null);
        $this->setIfExists('exp_month', $data ?? [], null);
        $this->setIfExists('exp_year', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('number', $data ?? [], null);
        $this->setIfExists('customer_ip_address', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('monthly_installments', $data ?? [], null);
        $this->setIfExists('token_id', $data ?? [], null);
        $this->setIfExists('payment_source_id', $data ?? [], null);
        $this->setIfExists('contract_id', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['cancel_url'] === null) {
            $invalidProperties[] = "'cancel_url' can't be null";
        }
        if ($this->container['can_not_expire'] === null) {
            $invalidProperties[] = "'can_not_expire' can't be null";
        }
        if ($this->container['failure_url'] === null) {
            $invalidProperties[] = "'failure_url' can't be null";
        }
        if ($this->container['product_type'] === null) {
            $invalidProperties[] = "'product_type' can't be null";
        }
        $allowedValues = $this->getProductTypeAllowableValues();
        if (!is_null($this->container['product_type']) && !in_array($this->container['product_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'product_type', must be one of '%s'",
                $this->container['product_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['success_url'] === null) {
            $invalidProperties[] = "'success_url' can't be null";
        }
        if ($this->container['cvc'] === null) {
            $invalidProperties[] = "'cvc' can't be null";
        }
        if ($this->container['exp_month'] === null) {
            $invalidProperties[] = "'exp_month' can't be null";
        }
        if ((mb_strlen($this->container['exp_month']) > 2)) {
            $invalidProperties[] = "invalid value for 'exp_month', the character length must be smaller than or equal to 2.";
        }

        if ((mb_strlen($this->container['exp_month']) < 2)) {
            $invalidProperties[] = "invalid value for 'exp_month', the character length must be bigger than or equal to 2.";
        }

        if ($this->container['exp_year'] === null) {
            $invalidProperties[] = "'exp_year' can't be null";
        }
        if ((mb_strlen($this->container['exp_year']) > 4)) {
            $invalidProperties[] = "invalid value for 'exp_year', the character length must be smaller than or equal to 4.";
        }

        if ((mb_strlen($this->container['exp_year']) < 4)) {
            $invalidProperties[] = "invalid value for 'exp_year', the character length must be bigger than or equal to 4.";
        }

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['number'] === null) {
            $invalidProperties[] = "'number' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Type of payment method
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets cancel_url
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->container['cancel_url'];
    }

    /**
     * Sets cancel_url
     *
     * @param string $cancel_url URL to redirect the customer after a canceled payment
     *
     * @return self
     */
    public function setCancelUrl($cancel_url)
    {
        if (is_null($cancel_url)) {
            throw new \InvalidArgumentException('non-nullable cancel_url cannot be null');
        }
        $this->container['cancel_url'] = $cancel_url;

        return $this;
    }

    /**
     * Gets can_not_expire
     *
     * @return bool
     */
    public function getCanNotExpire()
    {
        return $this->container['can_not_expire'];
    }

    /**
     * Sets can_not_expire
     *
     * @param bool $can_not_expire Indicates if the payment method can not expire
     *
     * @return self
     */
    public function setCanNotExpire($can_not_expire)
    {
        if (is_null($can_not_expire)) {
            throw new \InvalidArgumentException('non-nullable can_not_expire cannot be null');
        }
        $this->container['can_not_expire'] = $can_not_expire;

        return $this;
    }

    /**
     * Gets failure_url
     *
     * @return string
     */
    public function getFailureUrl()
    {
        return $this->container['failure_url'];
    }

    /**
     * Sets failure_url
     *
     * @param string $failure_url URL to redirect the customer after a failed payment
     *
     * @return self
     */
    public function setFailureUrl($failure_url)
    {
        if (is_null($failure_url)) {
            throw new \InvalidArgumentException('non-nullable failure_url cannot be null');
        }
        $this->container['failure_url'] = $failure_url;

        return $this;
    }

    /**
     * Gets product_type
     *
     * @return string
     */
    public function getProductType()
    {
        return $this->container['product_type'];
    }

    /**
     * Sets product_type
     *
     * @param string $product_type Product type of the payment method, use for the payment method to know the product type
     *
     * @return self
     */
    public function setProductType($product_type)
    {
        if (is_null($product_type)) {
            throw new \InvalidArgumentException('non-nullable product_type cannot be null');
        }
        $allowedValues = $this->getProductTypeAllowableValues();
        if (!in_array($product_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'product_type', must be one of '%s'",
                    $product_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['product_type'] = $product_type;

        return $this;
    }

    /**
     * Gets success_url
     *
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->container['success_url'];
    }

    /**
     * Sets success_url
     *
     * @param string $success_url URL to redirect the customer after a successful payment
     *
     * @return self
     */
    public function setSuccessUrl($success_url)
    {
        if (is_null($success_url)) {
            throw new \InvalidArgumentException('non-nullable success_url cannot be null');
        }
        $this->container['success_url'] = $success_url;

        return $this;
    }

    /**
     * Gets cvc
     *
     * @return string
     */
    public function getCvc()
    {
        return $this->container['cvc'];
    }

    /**
     * Sets cvc
     *
     * @param string $cvc Optional, It is a value that allows identifying the security code of the card. Only for PCI merchants
     *
     * @return self
     */
    public function setCvc($cvc)
    {
        if (is_null($cvc)) {
            throw new \InvalidArgumentException('non-nullable cvc cannot be null');
        }
        $this->container['cvc'] = $cvc;

        return $this;
    }

    /**
     * Gets exp_month
     *
     * @return string
     */
    public function getExpMonth()
    {
        return $this->container['exp_month'];
    }

    /**
     * Sets exp_month
     *
     * @param string $exp_month Card expiration month
     *
     * @return self
     */
    public function setExpMonth($exp_month)
    {
        if (is_null($exp_month)) {
            throw new \InvalidArgumentException('non-nullable exp_month cannot be null');
        }
        if ((mb_strlen($exp_month) > 2)) {
            throw new \InvalidArgumentException('invalid length for $exp_month when calling ChargeRequestPaymentMethod., must be smaller than or equal to 2.');
        }
        if ((mb_strlen($exp_month) < 2)) {
            throw new \InvalidArgumentException('invalid length for $exp_month when calling ChargeRequestPaymentMethod., must be bigger than or equal to 2.');
        }

        $this->container['exp_month'] = $exp_month;

        return $this;
    }

    /**
     * Gets exp_year
     *
     * @return string
     */
    public function getExpYear()
    {
        return $this->container['exp_year'];
    }

    /**
     * Sets exp_year
     *
     * @param string $exp_year Card expiration year
     *
     * @return self
     */
    public function setExpYear($exp_year)
    {
        if (is_null($exp_year)) {
            throw new \InvalidArgumentException('non-nullable exp_year cannot be null');
        }
        if ((mb_strlen($exp_year) > 4)) {
            throw new \InvalidArgumentException('invalid length for $exp_year when calling ChargeRequestPaymentMethod., must be smaller than or equal to 4.');
        }
        if ((mb_strlen($exp_year) < 4)) {
            throw new \InvalidArgumentException('invalid length for $exp_year when calling ChargeRequestPaymentMethod., must be bigger than or equal to 4.');
        }

        $this->container['exp_year'] = $exp_year;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Cardholder name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->container['number'];
    }

    /**
     * Sets number
     *
     * @param string $number Card number
     *
     * @return self
     */
    public function setNumber($number)
    {
        if (is_null($number)) {
            throw new \InvalidArgumentException('non-nullable number cannot be null');
        }
        $this->container['number'] = $number;

        return $this;
    }

    /**
     * Gets customer_ip_address
     *
     * @return string|null
     */
    public function getCustomerIpAddress()
    {
        return $this->container['customer_ip_address'];
    }

    /**
     * Sets customer_ip_address
     *
     * @param string|null $customer_ip_address Optional field used to capture the customer's IP address for fraud prevention and security monitoring purposes
     *
     * @return self
     */
    public function setCustomerIpAddress($customer_ip_address)
    {
        if (is_null($customer_ip_address)) {
            throw new \InvalidArgumentException('non-nullable customer_ip_address cannot be null');
        }
        $this->container['customer_ip_address'] = $customer_ip_address;

        return $this;
    }

    /**
     * Gets expires_at
     *
     * @return int|null
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param int|null $expires_at Method expiration date as unix timestamp
     *
     * @return self
     */
    public function setExpiresAt($expires_at)
    {
        if (is_null($expires_at)) {
            throw new \InvalidArgumentException('non-nullable expires_at cannot be null');
        }
        $this->container['expires_at'] = $expires_at;

        return $this;
    }

    /**
     * Gets monthly_installments
     *
     * @return int|null
     */
    public function getMonthlyInstallments()
    {
        return $this->container['monthly_installments'];
    }

    /**
     * Sets monthly_installments
     *
     * @param int|null $monthly_installments How many months without interest to apply, it can be 3, 6, 9, 12 or 18
     *
     * @return self
     */
    public function setMonthlyInstallments($monthly_installments)
    {
        if (is_null($monthly_installments)) {
            throw new \InvalidArgumentException('non-nullable monthly_installments cannot be null');
        }
        $this->container['monthly_installments'] = $monthly_installments;

        return $this;
    }

    /**
     * Gets token_id
     *
     * @return string|null
     */
    public function getTokenId()
    {
        return $this->container['token_id'];
    }

    /**
     * Sets token_id
     *
     * @param string|null $token_id token_id
     *
     * @return self
     */
    public function setTokenId($token_id)
    {
        if (is_null($token_id)) {
            throw new \InvalidArgumentException('non-nullable token_id cannot be null');
        }
        $this->container['token_id'] = $token_id;

        return $this;
    }

    /**
     * Gets payment_source_id
     *
     * @return string|null
     */
    public function getPaymentSourceId()
    {
        return $this->container['payment_source_id'];
    }

    /**
     * Sets payment_source_id
     *
     * @param string|null $payment_source_id payment_source_id
     *
     * @return self
     */
    public function setPaymentSourceId($payment_source_id)
    {
        if (is_null($payment_source_id)) {
            throw new \InvalidArgumentException('non-nullable payment_source_id cannot be null');
        }
        $this->container['payment_source_id'] = $payment_source_id;

        return $this;
    }

    /**
     * Gets contract_id
     *
     * @return string|null
     */
    public function getContractId()
    {
        return $this->container['contract_id'];
    }

    /**
     * Sets contract_id
     *
     * @param string|null $contract_id Optional id sent to indicate the bank contract for recurrent card charges.
     *
     * @return self
     */
    public function setContractId($contract_id)
    {
        if (is_null($contract_id)) {
            throw new \InvalidArgumentException('non-nullable contract_id cannot be null');
        }
        $this->container['contract_id'] = $contract_id;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


