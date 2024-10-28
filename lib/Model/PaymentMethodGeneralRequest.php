<?php
/**
 * PaymentMethodGeneralRequest
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
 * PaymentMethodGeneralRequest Class Doc Comment
 *
 * @category Class
 * @description Payment method used in the charge. Go to the [payment methods](https://developers.conekta.com/reference/m%C3%A9todos-de-pago) section for more details
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentMethodGeneralRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'payment_method_general_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'expires_at' => 'int',
        'monthly_installments' => 'int',
        'type' => 'string',
        'token_id' => 'string',
        'payment_source_id' => 'string',
        'cvc' => 'string',
        'contract_id' => 'string',
        'customer_ip_address' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'expires_at' => 'int64',
        'monthly_installments' => 'int8',
        'type' => null,
        'token_id' => null,
        'payment_source_id' => null,
        'cvc' => null,
        'contract_id' => null,
        'customer_ip_address' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'expires_at' => false,
        'monthly_installments' => false,
        'type' => false,
        'token_id' => false,
        'payment_source_id' => false,
        'cvc' => false,
        'contract_id' => false,
        'customer_ip_address' => false
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
        'expires_at' => 'expires_at',
        'monthly_installments' => 'monthly_installments',
        'type' => 'type',
        'token_id' => 'token_id',
        'payment_source_id' => 'payment_source_id',
        'cvc' => 'cvc',
        'contract_id' => 'contract_id',
        'customer_ip_address' => 'customer_ip_address'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'expires_at' => 'setExpiresAt',
        'monthly_installments' => 'setMonthlyInstallments',
        'type' => 'setType',
        'token_id' => 'setTokenId',
        'payment_source_id' => 'setPaymentSourceId',
        'cvc' => 'setCvc',
        'contract_id' => 'setContractId',
        'customer_ip_address' => 'setCustomerIpAddress'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'expires_at' => 'getExpiresAt',
        'monthly_installments' => 'getMonthlyInstallments',
        'type' => 'getType',
        'token_id' => 'getTokenId',
        'payment_source_id' => 'getPaymentSourceId',
        'cvc' => 'getCvc',
        'contract_id' => 'getContractId',
        'customer_ip_address' => 'getCustomerIpAddress'
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
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('monthly_installments', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('token_id', $data ?? [], null);
        $this->setIfExists('payment_source_id', $data ?? [], null);
        $this->setIfExists('cvc', $data ?? [], null);
        $this->setIfExists('contract_id', $data ?? [], null);
        $this->setIfExists('customer_ip_address', $data ?? [], null);
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
     * Gets cvc
     *
     * @return string|null
     */
    public function getCvc()
    {
        return $this->container['cvc'];
    }

    /**
     * Sets cvc
     *
     * @param string|null $cvc Optional, It is a value that allows identifying the security code of the card. Only for PCI merchants
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


