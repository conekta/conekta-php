<?php
/**
 * Customer
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
 * Customer Class Doc Comment
 *
 * @category Class
 * @description a customer
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Customer implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'customer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'antifraud_info' => '\Conekta\Model\CustomerAntifraudInfo',
        'corporate' => 'bool',
        'custom_reference' => 'string',
        'email' => 'string',
        'default_payment_source_id' => 'string',
        'default_shipping_contact_id' => 'string',
        'fiscal_entities' => '\Conekta\Model\CustomerFiscalEntitiesRequest[]',
        'metadata' => 'array<string,mixed>',
        'name' => 'string',
        'payment_sources' => '\Conekta\Model\CustomerPaymentMethodsRequest[]',
        'phone' => 'string',
        'plan_id' => 'string',
        'shipping_contacts' => '\Conekta\Model\CustomerShippingContacts[]',
        'subscription' => '\Conekta\Model\SubscriptionRequest'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'antifraud_info' => null,
        'corporate' => null,
        'custom_reference' => null,
        'email' => 'email',
        'default_payment_source_id' => null,
        'default_shipping_contact_id' => null,
        'fiscal_entities' => null,
        'metadata' => null,
        'name' => null,
        'payment_sources' => null,
        'phone' => null,
        'plan_id' => null,
        'shipping_contacts' => null,
        'subscription' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'antifraud_info' => true,
        'corporate' => false,
        'custom_reference' => false,
        'email' => false,
        'default_payment_source_id' => false,
        'default_shipping_contact_id' => false,
        'fiscal_entities' => false,
        'metadata' => false,
        'name' => false,
        'payment_sources' => false,
        'phone' => false,
        'plan_id' => false,
        'shipping_contacts' => false,
        'subscription' => false
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
        'antifraud_info' => 'antifraud_info',
        'corporate' => 'corporate',
        'custom_reference' => 'custom_reference',
        'email' => 'email',
        'default_payment_source_id' => 'default_payment_source_id',
        'default_shipping_contact_id' => 'default_shipping_contact_id',
        'fiscal_entities' => 'fiscal_entities',
        'metadata' => 'metadata',
        'name' => 'name',
        'payment_sources' => 'payment_sources',
        'phone' => 'phone',
        'plan_id' => 'plan_id',
        'shipping_contacts' => 'shipping_contacts',
        'subscription' => 'subscription'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'antifraud_info' => 'setAntifraudInfo',
        'corporate' => 'setCorporate',
        'custom_reference' => 'setCustomReference',
        'email' => 'setEmail',
        'default_payment_source_id' => 'setDefaultPaymentSourceId',
        'default_shipping_contact_id' => 'setDefaultShippingContactId',
        'fiscal_entities' => 'setFiscalEntities',
        'metadata' => 'setMetadata',
        'name' => 'setName',
        'payment_sources' => 'setPaymentSources',
        'phone' => 'setPhone',
        'plan_id' => 'setPlanId',
        'shipping_contacts' => 'setShippingContacts',
        'subscription' => 'setSubscription'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'antifraud_info' => 'getAntifraudInfo',
        'corporate' => 'getCorporate',
        'custom_reference' => 'getCustomReference',
        'email' => 'getEmail',
        'default_payment_source_id' => 'getDefaultPaymentSourceId',
        'default_shipping_contact_id' => 'getDefaultShippingContactId',
        'fiscal_entities' => 'getFiscalEntities',
        'metadata' => 'getMetadata',
        'name' => 'getName',
        'payment_sources' => 'getPaymentSources',
        'phone' => 'getPhone',
        'plan_id' => 'getPlanId',
        'shipping_contacts' => 'getShippingContacts',
        'subscription' => 'getSubscription'
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
        $this->setIfExists('antifraud_info', $data ?? [], null);
        $this->setIfExists('corporate', $data ?? [], false);
        $this->setIfExists('custom_reference', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('default_payment_source_id', $data ?? [], null);
        $this->setIfExists('default_shipping_contact_id', $data ?? [], null);
        $this->setIfExists('fiscal_entities', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('payment_sources', $data ?? [], null);
        $this->setIfExists('phone', $data ?? [], null);
        $this->setIfExists('plan_id', $data ?? [], null);
        $this->setIfExists('shipping_contacts', $data ?? [], null);
        $this->setIfExists('subscription', $data ?? [], null);
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

        if ($this->container['email'] === null) {
            $invalidProperties[] = "'email' can't be null";
        }
        if (!is_null($this->container['metadata']) && (count($this->container['metadata']) > 100)) {
            $invalidProperties[] = "invalid value for 'metadata', number of items must be less than or equal to 100.";
        }

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['phone'] === null) {
            $invalidProperties[] = "'phone' can't be null";
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
     * Gets antifraud_info
     *
     * @return \Conekta\Model\CustomerAntifraudInfo|null
     */
    public function getAntifraudInfo()
    {
        return $this->container['antifraud_info'];
    }

    /**
     * Sets antifraud_info
     *
     * @param \Conekta\Model\CustomerAntifraudInfo|null $antifraud_info antifraud_info
     *
     * @return self
     */
    public function setAntifraudInfo($antifraud_info)
    {
        if (is_null($antifraud_info)) {
            array_push($this->openAPINullablesSetToNull, 'antifraud_info');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('antifraud_info', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['antifraud_info'] = $antifraud_info;

        return $this;
    }

    /**
     * Gets corporate
     *
     * @return bool|null
     */
    public function getCorporate()
    {
        return $this->container['corporate'];
    }

    /**
     * Sets corporate
     *
     * @param bool|null $corporate It is a value that allows identifying if the email is corporate or not.
     *
     * @return self
     */
    public function setCorporate($corporate)
    {
        if (is_null($corporate)) {
            throw new \InvalidArgumentException('non-nullable corporate cannot be null');
        }
        $this->container['corporate'] = $corporate;

        return $this;
    }

    /**
     * Gets custom_reference
     *
     * @return string|null
     */
    public function getCustomReference()
    {
        return $this->container['custom_reference'];
    }

    /**
     * Sets custom_reference
     *
     * @param string|null $custom_reference It is an undefined value.
     *
     * @return self
     */
    public function setCustomReference($custom_reference)
    {
        if (is_null($custom_reference)) {
            throw new \InvalidArgumentException('non-nullable custom_reference cannot be null');
        }
        $this->container['custom_reference'] = $custom_reference;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email An email address is a series of customizable characters followed by a universal Internet symbol, the at symbol (@), the name of a host server, and a web domain ending (.mx, .com, .org, . net, etc).
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets default_payment_source_id
     *
     * @return string|null
     */
    public function getDefaultPaymentSourceId()
    {
        return $this->container['default_payment_source_id'];
    }

    /**
     * Sets default_payment_source_id
     *
     * @param string|null $default_payment_source_id It is a parameter that allows to identify in the response, the Conekta ID of a payment method (payment_id)
     *
     * @return self
     */
    public function setDefaultPaymentSourceId($default_payment_source_id)
    {
        if (is_null($default_payment_source_id)) {
            throw new \InvalidArgumentException('non-nullable default_payment_source_id cannot be null');
        }
        $this->container['default_payment_source_id'] = $default_payment_source_id;

        return $this;
    }

    /**
     * Gets default_shipping_contact_id
     *
     * @return string|null
     */
    public function getDefaultShippingContactId()
    {
        return $this->container['default_shipping_contact_id'];
    }

    /**
     * Sets default_shipping_contact_id
     *
     * @param string|null $default_shipping_contact_id It is a parameter that allows to identify in the response, the Conekta ID of the shipping address (shipping_contact)
     *
     * @return self
     */
    public function setDefaultShippingContactId($default_shipping_contact_id)
    {
        if (is_null($default_shipping_contact_id)) {
            throw new \InvalidArgumentException('non-nullable default_shipping_contact_id cannot be null');
        }
        $this->container['default_shipping_contact_id'] = $default_shipping_contact_id;

        return $this;
    }

    /**
     * Gets fiscal_entities
     *
     * @return \Conekta\Model\CustomerFiscalEntitiesRequest[]|null
     */
    public function getFiscalEntities()
    {
        return $this->container['fiscal_entities'];
    }

    /**
     * Sets fiscal_entities
     *
     * @param \Conekta\Model\CustomerFiscalEntitiesRequest[]|null $fiscal_entities fiscal_entities
     *
     * @return self
     */
    public function setFiscalEntities($fiscal_entities)
    {
        if (is_null($fiscal_entities)) {
            throw new \InvalidArgumentException('non-nullable fiscal_entities cannot be null');
        }
        $this->container['fiscal_entities'] = $fiscal_entities;

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
     * @param array<string,mixed>|null $metadata metadata
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        if (is_null($metadata)) {
            throw new \InvalidArgumentException('non-nullable metadata cannot be null');
        }

        if ((count($metadata) > 100)) {
            throw new \InvalidArgumentException('invalid value for $metadata when calling Customer., number of items must be less than or equal to 100.');
        }
        $this->container['metadata'] = $metadata;

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
     * @param string $name Client's name
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
     * Gets payment_sources
     *
     * @return \Conekta\Model\CustomerPaymentMethodsRequest[]|null
     */
    public function getPaymentSources()
    {
        return $this->container['payment_sources'];
    }

    /**
     * Sets payment_sources
     *
     * @param \Conekta\Model\CustomerPaymentMethodsRequest[]|null $payment_sources Contains details of the payment methods that the customer has active or has used in Conekta
     *
     * @return self
     */
    public function setPaymentSources($payment_sources)
    {
        if (is_null($payment_sources)) {
            throw new \InvalidArgumentException('non-nullable payment_sources cannot be null');
        }
        $this->container['payment_sources'] = $payment_sources;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string $phone Is the customer's phone number
     *
     * @return self
     */
    public function setPhone($phone)
    {
        if (is_null($phone)) {
            throw new \InvalidArgumentException('non-nullable phone cannot be null');
        }
        $this->container['phone'] = $phone;

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
     * @param string|null $plan_id Contains the ID of a plan, which could together with name, email and phone create a client directly to a subscription
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
     * Gets shipping_contacts
     *
     * @return \Conekta\Model\CustomerShippingContacts[]|null
     */
    public function getShippingContacts()
    {
        return $this->container['shipping_contacts'];
    }

    /**
     * Sets shipping_contacts
     *
     * @param \Conekta\Model\CustomerShippingContacts[]|null $shipping_contacts Contains the detail of the shipping addresses that the client has active or has used in Conekta
     *
     * @return self
     */
    public function setShippingContacts($shipping_contacts)
    {
        if (is_null($shipping_contacts)) {
            throw new \InvalidArgumentException('non-nullable shipping_contacts cannot be null');
        }
        $this->container['shipping_contacts'] = $shipping_contacts;

        return $this;
    }

    /**
     * Gets subscription
     *
     * @return \Conekta\Model\SubscriptionRequest|null
     */
    public function getSubscription()
    {
        return $this->container['subscription'];
    }

    /**
     * Sets subscription
     *
     * @param \Conekta\Model\SubscriptionRequest|null $subscription subscription
     *
     * @return self
     */
    public function setSubscription($subscription)
    {
        if (is_null($subscription)) {
            throw new \InvalidArgumentException('non-nullable subscription cannot be null');
        }
        $this->container['subscription'] = $subscription;

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


