<?php
/**
 * Checkout
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
 * OpenAPI Generator version: 6.6.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Conekta\Model;

use ArrayAccess;
use Conekta\ObjectSerializer;

/**
 * Checkout Class Doc Comment
 *
 * @category Class
 * @description It is a sub-resource of the Order model that can be stipulated in order to configure its corresponding checkout
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Checkout implements \JsonSerializable, ArrayAccess, ModelInterface
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'checkout';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'allowed_payment_methods'      => 'string[]',
        'expires_at'                   => 'int',
        'monthly_installments_enabled' => 'bool',
        'monthly_installments_options' => 'int[]',
        'name'                         => 'string',
        'needs_shipping_contact'       => 'bool',
        'on_demand_enabled'            => 'bool',
        'order_template'               => '\Conekta\Model\CheckoutOrderTemplate',
        'payments_limit_count'         => 'int',
        'recurrent'                    => 'bool',
        'type'                         => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'allowed_payment_methods'      => null,
        'expires_at'                   => 'int64',
        'monthly_installments_enabled' => null,
        'monthly_installments_options' => 'int8',
        'name'                         => null,
        'needs_shipping_contact'       => null,
        'on_demand_enabled'            => null,
        'order_template'               => null,
        'payments_limit_count'         => 'int8',
        'recurrent'                    => null,
        'type'                         => null
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var boolean[]
     */
    protected static array $openAPINullables = [
        'allowed_payment_methods'      => false,
        'expires_at'                   => false,
        'monthly_installments_enabled' => false,
        'monthly_installments_options' => false,
        'name'                         => false,
        'needs_shipping_contact'       => false,
        'on_demand_enabled'            => true,
        'order_template'               => false,
        'payments_limit_count'         => false,
        'recurrent'                    => false,
        'type'                         => false
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
        'allowed_payment_methods'      => 'allowed_payment_methods',
        'expires_at'                   => 'expires_at',
        'monthly_installments_enabled' => 'monthly_installments_enabled',
        'monthly_installments_options' => 'monthly_installments_options',
        'name'                         => 'name',
        'needs_shipping_contact'       => 'needs_shipping_contact',
        'on_demand_enabled'            => 'on_demand_enabled',
        'order_template'               => 'order_template',
        'payments_limit_count'         => 'payments_limit_count',
        'recurrent'                    => 'recurrent',
        'type'                         => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allowed_payment_methods'      => 'setAllowedPaymentMethods',
        'expires_at'                   => 'setExpiresAt',
        'monthly_installments_enabled' => 'setMonthlyInstallmentsEnabled',
        'monthly_installments_options' => 'setMonthlyInstallmentsOptions',
        'name'                         => 'setName',
        'needs_shipping_contact'       => 'setNeedsShippingContact',
        'on_demand_enabled'            => 'setOnDemandEnabled',
        'order_template'               => 'setOrderTemplate',
        'payments_limit_count'         => 'setPaymentsLimitCount',
        'recurrent'                    => 'setRecurrent',
        'type'                         => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allowed_payment_methods'      => 'getAllowedPaymentMethods',
        'expires_at'                   => 'getExpiresAt',
        'monthly_installments_enabled' => 'getMonthlyInstallmentsEnabled',
        'monthly_installments_options' => 'getMonthlyInstallmentsOptions',
        'name'                         => 'getName',
        'needs_shipping_contact'       => 'getNeedsShippingContact',
        'on_demand_enabled'            => 'getOnDemandEnabled',
        'order_template'               => 'getOrderTemplate',
        'payments_limit_count'         => 'getPaymentsLimitCount',
        'recurrent'                    => 'getRecurrent',
        'type'                         => 'getType'
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
        $this->setIfExists('allowed_payment_methods', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('monthly_installments_enabled', $data ?? [], null);
        $this->setIfExists('monthly_installments_options', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('needs_shipping_contact', $data ?? [], null);
        $this->setIfExists('on_demand_enabled', $data ?? [], null);
        $this->setIfExists('order_template', $data ?? [], null);
        $this->setIfExists('payments_limit_count', $data ?? [], null);
        $this->setIfExists('recurrent', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
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

        if ($this->container['allowed_payment_methods'] === null) {
            $invalidProperties[] = "'allowed_payment_methods' can't be null";
        }
        if ($this->container['expires_at'] === null) {
            $invalidProperties[] = "'expires_at' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['order_template'] === null) {
            $invalidProperties[] = "'order_template' can't be null";
        }
        if ($this->container['recurrent'] === null) {
            $invalidProperties[] = "'recurrent' can't be null";
        }
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
     * Gets allowed_payment_methods
     *
     * @return string[]
     */
    public function getAllowedPaymentMethods()
    {
        return $this->container['allowed_payment_methods'];
    }

    /**
     * Sets allowed_payment_methods
     *
     * @param string[] $allowed_payment_methods Those are the payment methods that will be available for the link
     *
     * @return self
     */
    public function setAllowedPaymentMethods($allowed_payment_methods)
    {
        if (is_null($allowed_payment_methods)) {
            throw new \InvalidArgumentException('non-nullable allowed_payment_methods cannot be null');
        }
        $this->container['allowed_payment_methods'] = $allowed_payment_methods;

        return $this;
    }

    /**
     * Gets expires_at
     *
     * @return int
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param int $expires_at It is the time when the link will expire. It is expressed in seconds since the Unix epoch. The valid range is from 2 to 365 days (the valid range will be taken from the next day of the creation date at 00:01 hrs)
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
     * Gets monthly_installments_enabled
     *
     * @return bool|null
     */
    public function getMonthlyInstallmentsEnabled()
    {
        return $this->container['monthly_installments_enabled'];
    }

    /**
     * Sets monthly_installments_enabled
     *
     * @param bool|null $monthly_installments_enabled This flag allows you to specify if months without interest will be active.
     *
     * @return self
     */
    public function setMonthlyInstallmentsEnabled($monthly_installments_enabled)
    {
        if (is_null($monthly_installments_enabled)) {
            throw new \InvalidArgumentException('non-nullable monthly_installments_enabled cannot be null');
        }
        $this->container['monthly_installments_enabled'] = $monthly_installments_enabled;

        return $this;
    }

    /**
     * Gets monthly_installments_options
     *
     * @return int[]|null
     */
    public function getMonthlyInstallmentsOptions()
    {
        return $this->container['monthly_installments_options'];
    }

    /**
     * Sets monthly_installments_options
     *
     * @param int[]|null $monthly_installments_options This field allows you to specify the number of months without interest.
     *
     * @return self
     */
    public function setMonthlyInstallmentsOptions($monthly_installments_options)
    {
        if (is_null($monthly_installments_options)) {
            throw new \InvalidArgumentException('non-nullable monthly_installments_options cannot be null');
        }
        $this->container['monthly_installments_options'] = $monthly_installments_options;

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
     * @param string $name Reason for charge
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
     * Gets needs_shipping_contact
     *
     * @return bool|null
     */
    public function getNeedsShippingContact()
    {
        return $this->container['needs_shipping_contact'];
    }

    /**
     * Sets needs_shipping_contact
     *
     * @param bool|null $needs_shipping_contact This flag allows you to fill in the shipping information at checkout.
     *
     * @return self
     */
    public function setNeedsShippingContact($needs_shipping_contact)
    {
        if (is_null($needs_shipping_contact)) {
            throw new \InvalidArgumentException('non-nullable needs_shipping_contact cannot be null');
        }
        $this->container['needs_shipping_contact'] = $needs_shipping_contact;

        return $this;
    }

    /**
     * Gets on_demand_enabled
     *
     * @return bool|null
     */
    public function getOnDemandEnabled()
    {
        return $this->container['on_demand_enabled'];
    }

    /**
     * Sets on_demand_enabled
     *
     * @param bool|null $on_demand_enabled This flag allows you to specify if the link will be on demand.
     *
     * @return self
     */
    public function setOnDemandEnabled($on_demand_enabled)
    {
        if (is_null($on_demand_enabled)) {
            array_push($this->openAPINullablesSetToNull, 'on_demand_enabled');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('on_demand_enabled', $nullablesSetToNull);
            if ($index !== false) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['on_demand_enabled'] = $on_demand_enabled;

        return $this;
    }

    /**
     * Gets order_template
     *
     * @return \Conekta\Model\CheckoutOrderTemplate
     */
    public function getOrderTemplate()
    {
        return $this->container['order_template'];
    }

    /**
     * Sets order_template
     *
     * @param \Conekta\Model\CheckoutOrderTemplate $order_template order_template
     *
     * @return self
     */
    public function setOrderTemplate($order_template)
    {
        if (is_null($order_template)) {
            throw new \InvalidArgumentException('non-nullable order_template cannot be null');
        }
        $this->container['order_template'] = $order_template;

        return $this;
    }

    /**
     * Gets payments_limit_count
     *
     * @return int|null
     */
    public function getPaymentsLimitCount()
    {
        return $this->container['payments_limit_count'];
    }

    /**
     * Sets payments_limit_count
     *
     * @param int|null $payments_limit_count It is the number of payments that can be made through the link.
     *
     * @return self
     */
    public function setPaymentsLimitCount($payments_limit_count)
    {
        if (is_null($payments_limit_count)) {
            throw new \InvalidArgumentException('non-nullable payments_limit_count cannot be null');
        }
        $this->container['payments_limit_count'] = $payments_limit_count;

        return $this;
    }

    /**
     * Gets recurrent
     *
     * @return bool
     */
    public function getRecurrent()
    {
        return $this->container['recurrent'];
    }

    /**
     * Sets recurrent
     *
     * @param bool $recurrent false: single use. true: multiple payments
     *
     * @return self
     */
    public function setRecurrent($recurrent)
    {
        if (is_null($recurrent)) {
            throw new \InvalidArgumentException('non-nullable recurrent cannot be null');
        }
        $this->container['recurrent'] = $recurrent;

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
     * @param string $type It is the type of link that will be created. It must be a valid type.
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
