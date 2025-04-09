<?php
/**
 * PayoutOrderResponse
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
 * The version of the OpenAPI document: 2.2.0
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
 * PayoutOrderResponse Class Doc Comment
 *
 * @category Class
 * @description payout order model response
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PayoutOrderResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'payout_order_response';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'allowed_payout_methods' => 'string[]',
        'amount' => 'int',
        'created_at' => 'int',
        'currency' => 'string',
        'customer_info' => '\Conekta\Model\PayoutOrderResponseCustomerInfo',
        'expires_at' => 'int',
        'id' => 'string',
        'livemode' => 'bool',
        'object' => 'string',
        'metadata' => 'array<string,mixed>',
        'payouts' => '\Conekta\Model\PayoutOrderPayoutsItem[]',
        'reason' => 'string',
        'status' => 'string',
        'updated_at' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'allowed_payout_methods' => null,
        'amount' => null,
        'created_at' => 'int64',
        'currency' => null,
        'customer_info' => null,
        'expires_at' => 'int64',
        'id' => null,
        'livemode' => null,
        'object' => null,
        'metadata' => null,
        'payouts' => null,
        'reason' => null,
        'status' => null,
        'updated_at' => 'int64'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'allowed_payout_methods' => false,
        'amount' => false,
        'created_at' => false,
        'currency' => false,
        'customer_info' => false,
        'expires_at' => false,
        'id' => false,
        'livemode' => false,
        'object' => false,
        'metadata' => false,
        'payouts' => false,
        'reason' => false,
        'status' => false,
        'updated_at' => false
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
        'allowed_payout_methods' => 'allowed_payout_methods',
        'amount' => 'amount',
        'created_at' => 'created_at',
        'currency' => 'currency',
        'customer_info' => 'customer_info',
        'expires_at' => 'expires_at',
        'id' => 'id',
        'livemode' => 'livemode',
        'object' => 'object',
        'metadata' => 'metadata',
        'payouts' => 'payouts',
        'reason' => 'reason',
        'status' => 'status',
        'updated_at' => 'updated_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allowed_payout_methods' => 'setAllowedPayoutMethods',
        'amount' => 'setAmount',
        'created_at' => 'setCreatedAt',
        'currency' => 'setCurrency',
        'customer_info' => 'setCustomerInfo',
        'expires_at' => 'setExpiresAt',
        'id' => 'setId',
        'livemode' => 'setLivemode',
        'object' => 'setObject',
        'metadata' => 'setMetadata',
        'payouts' => 'setPayouts',
        'reason' => 'setReason',
        'status' => 'setStatus',
        'updated_at' => 'setUpdatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allowed_payout_methods' => 'getAllowedPayoutMethods',
        'amount' => 'getAmount',
        'created_at' => 'getCreatedAt',
        'currency' => 'getCurrency',
        'customer_info' => 'getCustomerInfo',
        'expires_at' => 'getExpiresAt',
        'id' => 'getId',
        'livemode' => 'getLivemode',
        'object' => 'getObject',
        'metadata' => 'getMetadata',
        'payouts' => 'getPayouts',
        'reason' => 'getReason',
        'status' => 'getStatus',
        'updated_at' => 'getUpdatedAt'
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
        $this->setIfExists('allowed_payout_methods', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], 'MXN');
        $this->setIfExists('customer_info', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('livemode', $data ?? [], null);
        $this->setIfExists('object', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('payouts', $data ?? [], null);
        $this->setIfExists('reason', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
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

        if ($this->container['allowed_payout_methods'] === null) {
            $invalidProperties[] = "'allowed_payout_methods' can't be null";
        }
        if ((count($this->container['allowed_payout_methods']) < 1)) {
            $invalidProperties[] = "invalid value for 'allowed_payout_methods', number of items must be greater than or equal to 1.";
        }

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['customer_info'] === null) {
            $invalidProperties[] = "'customer_info' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['livemode'] === null) {
            $invalidProperties[] = "'livemode' can't be null";
        }
        if ($this->container['object'] === null) {
            $invalidProperties[] = "'object' can't be null";
        }
        if (!is_null($this->container['metadata']) && (count($this->container['metadata']) > 100)) {
            $invalidProperties[] = "invalid value for 'metadata', number of items must be less than or equal to 100.";
        }

        if ($this->container['payouts'] === null) {
            $invalidProperties[] = "'payouts' can't be null";
        }
        if ($this->container['reason'] === null) {
            $invalidProperties[] = "'reason' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
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
     * Gets allowed_payout_methods
     *
     * @return string[]
     */
    public function getAllowedPayoutMethods()
    {
        return $this->container['allowed_payout_methods'];
    }

    /**
     * Sets allowed_payout_methods
     *
     * @param string[] $allowed_payout_methods The payout methods that are allowed for the payout order.
     *
     * @return self
     */
    public function setAllowedPayoutMethods($allowed_payout_methods)
    {
        if (is_null($allowed_payout_methods)) {
            throw new \InvalidArgumentException('non-nullable allowed_payout_methods cannot be null');
        }


        if ((count($allowed_payout_methods) < 1)) {
            throw new \InvalidArgumentException('invalid length for $allowed_payout_methods when calling PayoutOrderResponse., number of items must be greater than or equal to 1.');
        }
        $this->container['allowed_payout_methods'] = $allowed_payout_methods;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param int $amount The amount of the payout order.
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param int $created_at The creation date of the payout order.
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency The currency in which the payout order is made.
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets customer_info
     *
     * @return \Conekta\Model\PayoutOrderResponseCustomerInfo
     */
    public function getCustomerInfo()
    {
        return $this->container['customer_info'];
    }

    /**
     * Sets customer_info
     *
     * @param \Conekta\Model\PayoutOrderResponseCustomerInfo $customer_info customer_info
     *
     * @return self
     */
    public function setCustomerInfo($customer_info)
    {
        if (is_null($customer_info)) {
            throw new \InvalidArgumentException('non-nullable customer_info cannot be null');
        }
        $this->container['customer_info'] = $customer_info;

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
     * @param int|null $expires_at The expiration date of the payout order.
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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id The id of the payout order.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets livemode
     *
     * @return bool
     */
    public function getLivemode()
    {
        return $this->container['livemode'];
    }

    /**
     * Sets livemode
     *
     * @param bool $livemode The live mode of the payout order.
     *
     * @return self
     */
    public function setLivemode($livemode)
    {
        if (is_null($livemode)) {
            throw new \InvalidArgumentException('non-nullable livemode cannot be null');
        }
        $this->container['livemode'] = $livemode;

        return $this;
    }

    /**
     * Gets object
     *
     * @return string
     */
    public function getObject()
    {
        return $this->container['object'];
    }

    /**
     * Sets object
     *
     * @param string $object The object of the payout order.
     *
     * @return self
     */
    public function setObject($object)
    {
        if (is_null($object)) {
            throw new \InvalidArgumentException('non-nullable object cannot be null');
        }
        $this->container['object'] = $object;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return array<string,mixed>|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param array<string,mixed>|null $metadata The metadata of the payout order.
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        if (is_null($metadata)) {
            throw new \InvalidArgumentException('non-nullable metadata cannot be null');
        }

        if ((count($metadata) > 100)) {
            throw new \InvalidArgumentException('invalid value for $metadata when calling PayoutOrderResponse., number of items must be less than or equal to 100.');
        }
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets payouts
     *
     * @return \Conekta\Model\PayoutOrderPayoutsItem[]
     */
    public function getPayouts()
    {
        return $this->container['payouts'];
    }

    /**
     * Sets payouts
     *
     * @param \Conekta\Model\PayoutOrderPayoutsItem[] $payouts The payout information of the payout order.
     *
     * @return self
     */
    public function setPayouts($payouts)
    {
        if (is_null($payouts)) {
            throw new \InvalidArgumentException('non-nullable payouts cannot be null');
        }
        $this->container['payouts'] = $payouts;

        return $this;
    }

    /**
     * Gets reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->container['reason'];
    }

    /**
     * Sets reason
     *
     * @param string $reason The reason for the payout order.
     *
     * @return self
     */
    public function setReason($reason)
    {
        if (is_null($reason)) {
            throw new \InvalidArgumentException('non-nullable reason cannot be null');
        }
        $this->container['reason'] = $reason;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status The status of the payout order.
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return int
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param int $updated_at The update date of the payout order.
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_null($updated_at)) {
            throw new \InvalidArgumentException('non-nullable updated_at cannot be null');
        }
        $this->container['updated_at'] = $updated_at;

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


