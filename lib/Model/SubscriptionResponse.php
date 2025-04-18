<?php
/**
 * SubscriptionResponse
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
 * SubscriptionResponse Class Doc Comment
 *
 * @category Class
 * @description subscription model
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SubscriptionResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'subscription_response';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'billing_cycle_start' => 'int',
        'billing_cycle_end' => 'int',
        'canceled_at' => 'int',
        'canceled_reason' => 'string',
        'card_id' => 'string',
        'charge_id' => 'string',
        'created_at' => 'int',
        'customer_custom_reference' => 'string',
        'customer_id' => 'string',
        'id' => 'string',
        'last_billing_cycle_order_id' => 'string',
        'object' => 'string',
        'paused_at' => 'int',
        'plan_id' => 'string',
        'status' => 'string',
        'subscription_start' => 'int',
        'trial_start' => 'int',
        'trial_end' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'billing_cycle_start' => 'int64',
        'billing_cycle_end' => 'int64',
        'canceled_at' => 'int64',
        'canceled_reason' => null,
        'card_id' => null,
        'charge_id' => null,
        'created_at' => 'int64',
        'customer_custom_reference' => null,
        'customer_id' => null,
        'id' => null,
        'last_billing_cycle_order_id' => null,
        'object' => null,
        'paused_at' => 'int64',
        'plan_id' => null,
        'status' => null,
        'subscription_start' => null,
        'trial_start' => 'int64',
        'trial_end' => 'int64'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'billing_cycle_start' => true,
        'billing_cycle_end' => true,
        'canceled_at' => true,
        'canceled_reason' => false,
        'card_id' => false,
        'charge_id' => true,
        'created_at' => false,
        'customer_custom_reference' => false,
        'customer_id' => false,
        'id' => false,
        'last_billing_cycle_order_id' => false,
        'object' => false,
        'paused_at' => true,
        'plan_id' => false,
        'status' => false,
        'subscription_start' => false,
        'trial_start' => true,
        'trial_end' => true
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
        'billing_cycle_start' => 'billing_cycle_start',
        'billing_cycle_end' => 'billing_cycle_end',
        'canceled_at' => 'canceled_at',
        'canceled_reason' => 'canceled_reason',
        'card_id' => 'card_id',
        'charge_id' => 'charge_id',
        'created_at' => 'created_at',
        'customer_custom_reference' => 'customer_custom_reference',
        'customer_id' => 'customer_id',
        'id' => 'id',
        'last_billing_cycle_order_id' => 'last_billing_cycle_order_id',
        'object' => 'object',
        'paused_at' => 'paused_at',
        'plan_id' => 'plan_id',
        'status' => 'status',
        'subscription_start' => 'subscription_start',
        'trial_start' => 'trial_start',
        'trial_end' => 'trial_end'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'billing_cycle_start' => 'setBillingCycleStart',
        'billing_cycle_end' => 'setBillingCycleEnd',
        'canceled_at' => 'setCanceledAt',
        'canceled_reason' => 'setCanceledReason',
        'card_id' => 'setCardId',
        'charge_id' => 'setChargeId',
        'created_at' => 'setCreatedAt',
        'customer_custom_reference' => 'setCustomerCustomReference',
        'customer_id' => 'setCustomerId',
        'id' => 'setId',
        'last_billing_cycle_order_id' => 'setLastBillingCycleOrderId',
        'object' => 'setObject',
        'paused_at' => 'setPausedAt',
        'plan_id' => 'setPlanId',
        'status' => 'setStatus',
        'subscription_start' => 'setSubscriptionStart',
        'trial_start' => 'setTrialStart',
        'trial_end' => 'setTrialEnd'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'billing_cycle_start' => 'getBillingCycleStart',
        'billing_cycle_end' => 'getBillingCycleEnd',
        'canceled_at' => 'getCanceledAt',
        'canceled_reason' => 'getCanceledReason',
        'card_id' => 'getCardId',
        'charge_id' => 'getChargeId',
        'created_at' => 'getCreatedAt',
        'customer_custom_reference' => 'getCustomerCustomReference',
        'customer_id' => 'getCustomerId',
        'id' => 'getId',
        'last_billing_cycle_order_id' => 'getLastBillingCycleOrderId',
        'object' => 'getObject',
        'paused_at' => 'getPausedAt',
        'plan_id' => 'getPlanId',
        'status' => 'getStatus',
        'subscription_start' => 'getSubscriptionStart',
        'trial_start' => 'getTrialStart',
        'trial_end' => 'getTrialEnd'
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
        $this->setIfExists('billing_cycle_start', $data ?? [], null);
        $this->setIfExists('billing_cycle_end', $data ?? [], null);
        $this->setIfExists('canceled_at', $data ?? [], null);
        $this->setIfExists('canceled_reason', $data ?? [], null);
        $this->setIfExists('card_id', $data ?? [], null);
        $this->setIfExists('charge_id', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('customer_custom_reference', $data ?? [], null);
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('last_billing_cycle_order_id', $data ?? [], null);
        $this->setIfExists('object', $data ?? [], null);
        $this->setIfExists('paused_at', $data ?? [], null);
        $this->setIfExists('plan_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('subscription_start', $data ?? [], null);
        $this->setIfExists('trial_start', $data ?? [], null);
        $this->setIfExists('trial_end', $data ?? [], null);
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
     * Gets billing_cycle_start
     *
     * @return int|null
     */
    public function getBillingCycleStart()
    {
        return $this->container['billing_cycle_start'];
    }

    /**
     * Sets billing_cycle_start
     *
     * @param int|null $billing_cycle_start billing_cycle_start
     *
     * @return self
     */
    public function setBillingCycleStart($billing_cycle_start)
    {
        if (is_null($billing_cycle_start)) {
            array_push($this->openAPINullablesSetToNull, 'billing_cycle_start');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('billing_cycle_start', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['billing_cycle_start'] = $billing_cycle_start;

        return $this;
    }

    /**
     * Gets billing_cycle_end
     *
     * @return int|null
     */
    public function getBillingCycleEnd()
    {
        return $this->container['billing_cycle_end'];
    }

    /**
     * Sets billing_cycle_end
     *
     * @param int|null $billing_cycle_end billing_cycle_end
     *
     * @return self
     */
    public function setBillingCycleEnd($billing_cycle_end)
    {
        if (is_null($billing_cycle_end)) {
            array_push($this->openAPINullablesSetToNull, 'billing_cycle_end');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('billing_cycle_end', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['billing_cycle_end'] = $billing_cycle_end;

        return $this;
    }

    /**
     * Gets canceled_at
     *
     * @return int|null
     */
    public function getCanceledAt()
    {
        return $this->container['canceled_at'];
    }

    /**
     * Sets canceled_at
     *
     * @param int|null $canceled_at canceled_at
     *
     * @return self
     */
    public function setCanceledAt($canceled_at)
    {
        if (is_null($canceled_at)) {
            array_push($this->openAPINullablesSetToNull, 'canceled_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('canceled_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['canceled_at'] = $canceled_at;

        return $this;
    }

    /**
     * Gets canceled_reason
     *
     * @return string|null
     */
    public function getCanceledReason()
    {
        return $this->container['canceled_reason'];
    }

    /**
     * Sets canceled_reason
     *
     * @param string|null $canceled_reason Reason for cancellation. This field appears when the subscription status is 'canceled'.
     *
     * @return self
     */
    public function setCanceledReason($canceled_reason)
    {
        if (is_null($canceled_reason)) {
            throw new \InvalidArgumentException('non-nullable canceled_reason cannot be null');
        }
        $this->container['canceled_reason'] = $canceled_reason;

        return $this;
    }

    /**
     * Gets card_id
     *
     * @return string|null
     */
    public function getCardId()
    {
        return $this->container['card_id'];
    }

    /**
     * Sets card_id
     *
     * @param string|null $card_id card_id
     *
     * @return self
     */
    public function setCardId($card_id)
    {
        if (is_null($card_id)) {
            throw new \InvalidArgumentException('non-nullable card_id cannot be null');
        }
        $this->container['card_id'] = $card_id;

        return $this;
    }

    /**
     * Gets charge_id
     *
     * @return string|null
     */
    public function getChargeId()
    {
        return $this->container['charge_id'];
    }

    /**
     * Sets charge_id
     *
     * @param string|null $charge_id charge_id
     *
     * @return self
     */
    public function setChargeId($charge_id)
    {
        if (is_null($charge_id)) {
            array_push($this->openAPINullablesSetToNull, 'charge_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('charge_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['charge_id'] = $charge_id;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return int|null
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param int|null $created_at created_at
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
     * Gets customer_custom_reference
     *
     * @return string|null
     */
    public function getCustomerCustomReference()
    {
        return $this->container['customer_custom_reference'];
    }

    /**
     * Sets customer_custom_reference
     *
     * @param string|null $customer_custom_reference customer_custom_reference
     *
     * @return self
     */
    public function setCustomerCustomReference($customer_custom_reference)
    {
        if (is_null($customer_custom_reference)) {
            throw new \InvalidArgumentException('non-nullable customer_custom_reference cannot be null');
        }
        $this->container['customer_custom_reference'] = $customer_custom_reference;

        return $this;
    }

    /**
     * Gets customer_id
     *
     * @return string|null
     */
    public function getCustomerId()
    {
        return $this->container['customer_id'];
    }

    /**
     * Sets customer_id
     *
     * @param string|null $customer_id customer_id
     *
     * @return self
     */
    public function setCustomerId($customer_id)
    {
        if (is_null($customer_id)) {
            throw new \InvalidArgumentException('non-nullable customer_id cannot be null');
        }
        $this->container['customer_id'] = $customer_id;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id id
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
     * Gets last_billing_cycle_order_id
     *
     * @return string|null
     */
    public function getLastBillingCycleOrderId()
    {
        return $this->container['last_billing_cycle_order_id'];
    }

    /**
     * Sets last_billing_cycle_order_id
     *
     * @param string|null $last_billing_cycle_order_id last_billing_cycle_order_id
     *
     * @return self
     */
    public function setLastBillingCycleOrderId($last_billing_cycle_order_id)
    {
        if (is_null($last_billing_cycle_order_id)) {
            throw new \InvalidArgumentException('non-nullable last_billing_cycle_order_id cannot be null');
        }
        $this->container['last_billing_cycle_order_id'] = $last_billing_cycle_order_id;

        return $this;
    }

    /**
     * Gets object
     *
     * @return string|null
     */
    public function getObject()
    {
        return $this->container['object'];
    }

    /**
     * Sets object
     *
     * @param string|null $object object
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
     * Gets paused_at
     *
     * @return int|null
     */
    public function getPausedAt()
    {
        return $this->container['paused_at'];
    }

    /**
     * Sets paused_at
     *
     * @param int|null $paused_at paused_at
     *
     * @return self
     */
    public function setPausedAt($paused_at)
    {
        if (is_null($paused_at)) {
            array_push($this->openAPINullablesSetToNull, 'paused_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('paused_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['paused_at'] = $paused_at;

        return $this;
    }

    /**
     * Gets plan_id
     *
     * @return string|null
     */
    public function getPlanId()
    {
        return $this->container['plan_id'];
    }

    /**
     * Sets plan_id
     *
     * @param string|null $plan_id plan_id
     *
     * @return self
     */
    public function setPlanId($plan_id)
    {
        if (is_null($plan_id)) {
            throw new \InvalidArgumentException('non-nullable plan_id cannot be null');
        }
        $this->container['plan_id'] = $plan_id;

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
     * @param string|null $status status
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
     * Gets subscription_start
     *
     * @return int|null
     */
    public function getSubscriptionStart()
    {
        return $this->container['subscription_start'];
    }

    /**
     * Sets subscription_start
     *
     * @param int|null $subscription_start subscription_start
     *
     * @return self
     */
    public function setSubscriptionStart($subscription_start)
    {
        if (is_null($subscription_start)) {
            throw new \InvalidArgumentException('non-nullable subscription_start cannot be null');
        }
        $this->container['subscription_start'] = $subscription_start;

        return $this;
    }

    /**
     * Gets trial_start
     *
     * @return int|null
     */
    public function getTrialStart()
    {
        return $this->container['trial_start'];
    }

    /**
     * Sets trial_start
     *
     * @param int|null $trial_start trial_start
     *
     * @return self
     */
    public function setTrialStart($trial_start)
    {
        if (is_null($trial_start)) {
            array_push($this->openAPINullablesSetToNull, 'trial_start');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('trial_start', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['trial_start'] = $trial_start;

        return $this;
    }

    /**
     * Gets trial_end
     *
     * @return int|null
     */
    public function getTrialEnd()
    {
        return $this->container['trial_end'];
    }

    /**
     * Sets trial_end
     *
     * @param int|null $trial_end trial_end
     *
     * @return self
     */
    public function setTrialEnd($trial_end)
    {
        if (is_null($trial_end)) {
            array_push($this->openAPINullablesSetToNull, 'trial_end');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('trial_end', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['trial_end'] = $trial_end;

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


