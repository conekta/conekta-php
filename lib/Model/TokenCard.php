<?php
/**
 * TokenCard
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
 * TokenCard Class Doc Comment
 *
 * @category Class
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class TokenCard implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'token_card';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cvc' => 'string',
        'device_fingerprint' => 'string',
        'exp_month' => 'string',
        'exp_year' => 'string',
        'name' => 'string',
        'number' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cvc' => null,
        'device_fingerprint' => null,
        'exp_month' => null,
        'exp_year' => null,
        'name' => null,
        'number' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'cvc' => false,
        'device_fingerprint' => false,
        'exp_month' => false,
        'exp_year' => false,
        'name' => false,
        'number' => false
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
        'cvc' => 'cvc',
        'device_fingerprint' => 'device_fingerprint',
        'exp_month' => 'exp_month',
        'exp_year' => 'exp_year',
        'name' => 'name',
        'number' => 'number'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cvc' => 'setCvc',
        'device_fingerprint' => 'setDeviceFingerprint',
        'exp_month' => 'setExpMonth',
        'exp_year' => 'setExpYear',
        'name' => 'setName',
        'number' => 'setNumber'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cvc' => 'getCvc',
        'device_fingerprint' => 'getDeviceFingerprint',
        'exp_month' => 'getExpMonth',
        'exp_year' => 'getExpYear',
        'name' => 'getName',
        'number' => 'getNumber'
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
        $this->setIfExists('cvc', $data ?? [], null);
        $this->setIfExists('device_fingerprint', $data ?? [], null);
        $this->setIfExists('exp_month', $data ?? [], null);
        $this->setIfExists('exp_year', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('number', $data ?? [], null);
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

        if ($this->container['cvc'] === null) {
            $invalidProperties[] = "'cvc' can't be null";
        }
        if ((mb_strlen($this->container['cvc']) > 4)) {
            $invalidProperties[] = "invalid value for 'cvc', the character length must be smaller than or equal to 4.";
        }

        if ($this->container['exp_month'] === null) {
            $invalidProperties[] = "'exp_month' can't be null";
        }
        if ((mb_strlen($this->container['exp_month']) > 2)) {
            $invalidProperties[] = "invalid value for 'exp_month', the character length must be smaller than or equal to 2.";
        }

        if ($this->container['exp_year'] === null) {
            $invalidProperties[] = "'exp_year' can't be null";
        }
        if ((mb_strlen($this->container['exp_year']) > 2)) {
            $invalidProperties[] = "invalid value for 'exp_year', the character length must be smaller than or equal to 2.";
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
     * @param string $cvc It is a value that allows identifying the security code of the card.
     *
     * @return self
     */
    public function setCvc($cvc)
    {
        if (is_null($cvc)) {
            throw new \InvalidArgumentException('non-nullable cvc cannot be null');
        }
        if ((mb_strlen($cvc) > 4)) {
            throw new \InvalidArgumentException('invalid length for $cvc when calling TokenCard., must be smaller than or equal to 4.');
        }

        $this->container['cvc'] = $cvc;

        return $this;
    }

    /**
     * Gets device_fingerprint
     *
     * @return string|null
     */
    public function getDeviceFingerprint()
    {
        return $this->container['device_fingerprint'];
    }

    /**
     * Sets device_fingerprint
     *
     * @param string|null $device_fingerprint It is a value that allows identifying the device fingerprint.
     *
     * @return self
     */
    public function setDeviceFingerprint($device_fingerprint)
    {
        if (is_null($device_fingerprint)) {
            throw new \InvalidArgumentException('non-nullable device_fingerprint cannot be null');
        }
        $this->container['device_fingerprint'] = $device_fingerprint;

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
     * @param string $exp_month It is a value that allows identifying the expiration month of the card.
     *
     * @return self
     */
    public function setExpMonth($exp_month)
    {
        if (is_null($exp_month)) {
            throw new \InvalidArgumentException('non-nullable exp_month cannot be null');
        }
        if ((mb_strlen($exp_month) > 2)) {
            throw new \InvalidArgumentException('invalid length for $exp_month when calling TokenCard., must be smaller than or equal to 2.');
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
     * @param string $exp_year It is a value that allows identifying the expiration year of the card.
     *
     * @return self
     */
    public function setExpYear($exp_year)
    {
        if (is_null($exp_year)) {
            throw new \InvalidArgumentException('non-nullable exp_year cannot be null');
        }
        if ((mb_strlen($exp_year) > 2)) {
            throw new \InvalidArgumentException('invalid length for $exp_year when calling TokenCard., must be smaller than or equal to 2.');
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
     * @param string $name It is a value that allows identifying the name of the cardholder.
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
     * @param string $number It is a value that allows identifying the number of the card.
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


