<?php
/**
 * PaymentMethodBankTransfer
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
 * PaymentMethodBankTransfer Class Doc Comment
 *
 * @category Class
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentMethodBankTransfer implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'payment_method_bank_transfer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => 'string',
        'object' => 'string',
        'bank' => 'string',
        'clabe' => 'string',
        'description' => 'string',
        'executed_at' => 'int',
        'expires_at' => 'int',
        'issuing_account_bank' => 'string',
        'issuing_account_number' => 'string',
        'issuing_account_holder_name' => 'string',
        'issuing_account_tax_id' => 'string',
        'payment_attempts' => 'mixed[]',
        'receiving_account_holder_name' => 'string',
        'receiving_account_number' => 'string',
        'receiving_account_bank' => 'string',
        'receiving_account_tax_id' => 'string',
        'reference_number' => 'string',
        'tracking_code' => 'string',
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
        'type' => null,
        'object' => null,
        'bank' => null,
        'clabe' => null,
        'description' => null,
        'executed_at' => null,
        'expires_at' => 'int64',
        'issuing_account_bank' => null,
        'issuing_account_number' => null,
        'issuing_account_holder_name' => null,
        'issuing_account_tax_id' => null,
        'payment_attempts' => null,
        'receiving_account_holder_name' => null,
        'receiving_account_number' => null,
        'receiving_account_bank' => null,
        'receiving_account_tax_id' => null,
        'reference_number' => null,
        'tracking_code' => null,
        'customer_ip_address' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'type' => false,
        'object' => false,
        'bank' => false,
        'clabe' => false,
        'description' => true,
        'executed_at' => true,
        'expires_at' => false,
        'issuing_account_bank' => true,
        'issuing_account_number' => true,
        'issuing_account_holder_name' => true,
        'issuing_account_tax_id' => true,
        'payment_attempts' => false,
        'receiving_account_holder_name' => true,
        'receiving_account_number' => false,
        'receiving_account_bank' => false,
        'receiving_account_tax_id' => true,
        'reference_number' => true,
        'tracking_code' => true,
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
        'type' => 'type',
        'object' => 'object',
        'bank' => 'bank',
        'clabe' => 'clabe',
        'description' => 'description',
        'executed_at' => 'executed_at',
        'expires_at' => 'expires_at',
        'issuing_account_bank' => 'issuing_account_bank',
        'issuing_account_number' => 'issuing_account_number',
        'issuing_account_holder_name' => 'issuing_account_holder_name',
        'issuing_account_tax_id' => 'issuing_account_tax_id',
        'payment_attempts' => 'payment_attempts',
        'receiving_account_holder_name' => 'receiving_account_holder_name',
        'receiving_account_number' => 'receiving_account_number',
        'receiving_account_bank' => 'receiving_account_bank',
        'receiving_account_tax_id' => 'receiving_account_tax_id',
        'reference_number' => 'reference_number',
        'tracking_code' => 'tracking_code',
        'customer_ip_address' => 'customer_ip_address'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'object' => 'setObject',
        'bank' => 'setBank',
        'clabe' => 'setClabe',
        'description' => 'setDescription',
        'executed_at' => 'setExecutedAt',
        'expires_at' => 'setExpiresAt',
        'issuing_account_bank' => 'setIssuingAccountBank',
        'issuing_account_number' => 'setIssuingAccountNumber',
        'issuing_account_holder_name' => 'setIssuingAccountHolderName',
        'issuing_account_tax_id' => 'setIssuingAccountTaxId',
        'payment_attempts' => 'setPaymentAttempts',
        'receiving_account_holder_name' => 'setReceivingAccountHolderName',
        'receiving_account_number' => 'setReceivingAccountNumber',
        'receiving_account_bank' => 'setReceivingAccountBank',
        'receiving_account_tax_id' => 'setReceivingAccountTaxId',
        'reference_number' => 'setReferenceNumber',
        'tracking_code' => 'setTrackingCode',
        'customer_ip_address' => 'setCustomerIpAddress'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'object' => 'getObject',
        'bank' => 'getBank',
        'clabe' => 'getClabe',
        'description' => 'getDescription',
        'executed_at' => 'getExecutedAt',
        'expires_at' => 'getExpiresAt',
        'issuing_account_bank' => 'getIssuingAccountBank',
        'issuing_account_number' => 'getIssuingAccountNumber',
        'issuing_account_holder_name' => 'getIssuingAccountHolderName',
        'issuing_account_tax_id' => 'getIssuingAccountTaxId',
        'payment_attempts' => 'getPaymentAttempts',
        'receiving_account_holder_name' => 'getReceivingAccountHolderName',
        'receiving_account_number' => 'getReceivingAccountNumber',
        'receiving_account_bank' => 'getReceivingAccountBank',
        'receiving_account_tax_id' => 'getReceivingAccountTaxId',
        'reference_number' => 'getReferenceNumber',
        'tracking_code' => 'getTrackingCode',
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
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('object', $data ?? [], null);
        $this->setIfExists('bank', $data ?? [], null);
        $this->setIfExists('clabe', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('executed_at', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
        $this->setIfExists('issuing_account_bank', $data ?? [], null);
        $this->setIfExists('issuing_account_number', $data ?? [], null);
        $this->setIfExists('issuing_account_holder_name', $data ?? [], null);
        $this->setIfExists('issuing_account_tax_id', $data ?? [], null);
        $this->setIfExists('payment_attempts', $data ?? [], null);
        $this->setIfExists('receiving_account_holder_name', $data ?? [], null);
        $this->setIfExists('receiving_account_number', $data ?? [], null);
        $this->setIfExists('receiving_account_bank', $data ?? [], null);
        $this->setIfExists('receiving_account_tax_id', $data ?? [], null);
        $this->setIfExists('reference_number', $data ?? [], null);
        $this->setIfExists('tracking_code', $data ?? [], null);
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

        if ($this->container['object'] === null) {
            $invalidProperties[] = "'object' can't be null";
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
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type type
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
     * @param string $object object
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
     * Gets bank
     *
     * @return string|null
     */
    public function getBank()
    {
        return $this->container['bank'];
    }

    /**
     * Sets bank
     *
     * @param string|null $bank bank
     *
     * @return self
     */
    public function setBank($bank)
    {
        if (is_null($bank)) {
            throw new \InvalidArgumentException('non-nullable bank cannot be null');
        }
        $this->container['bank'] = $bank;

        return $this;
    }

    /**
     * Gets clabe
     *
     * @return string|null
     */
    public function getClabe()
    {
        return $this->container['clabe'];
    }

    /**
     * Sets clabe
     *
     * @param string|null $clabe clabe
     *
     * @return self
     */
    public function setClabe($clabe)
    {
        if (is_null($clabe)) {
            throw new \InvalidArgumentException('non-nullable clabe cannot be null');
        }
        $this->container['clabe'] = $clabe;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description description
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            array_push($this->openAPINullablesSetToNull, 'description');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('description', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets executed_at
     *
     * @return int|null
     */
    public function getExecutedAt()
    {
        return $this->container['executed_at'];
    }

    /**
     * Sets executed_at
     *
     * @param int|null $executed_at executed_at
     *
     * @return self
     */
    public function setExecutedAt($executed_at)
    {
        if (is_null($executed_at)) {
            array_push($this->openAPINullablesSetToNull, 'executed_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('executed_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['executed_at'] = $executed_at;

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
     * @param int|null $expires_at expires_at
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
     * Gets issuing_account_bank
     *
     * @return string|null
     */
    public function getIssuingAccountBank()
    {
        return $this->container['issuing_account_bank'];
    }

    /**
     * Sets issuing_account_bank
     *
     * @param string|null $issuing_account_bank issuing_account_bank
     *
     * @return self
     */
    public function setIssuingAccountBank($issuing_account_bank)
    {
        if (is_null($issuing_account_bank)) {
            array_push($this->openAPINullablesSetToNull, 'issuing_account_bank');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('issuing_account_bank', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['issuing_account_bank'] = $issuing_account_bank;

        return $this;
    }

    /**
     * Gets issuing_account_number
     *
     * @return string|null
     */
    public function getIssuingAccountNumber()
    {
        return $this->container['issuing_account_number'];
    }

    /**
     * Sets issuing_account_number
     *
     * @param string|null $issuing_account_number issuing_account_number
     *
     * @return self
     */
    public function setIssuingAccountNumber($issuing_account_number)
    {
        if (is_null($issuing_account_number)) {
            array_push($this->openAPINullablesSetToNull, 'issuing_account_number');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('issuing_account_number', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['issuing_account_number'] = $issuing_account_number;

        return $this;
    }

    /**
     * Gets issuing_account_holder_name
     *
     * @return string|null
     */
    public function getIssuingAccountHolderName()
    {
        return $this->container['issuing_account_holder_name'];
    }

    /**
     * Sets issuing_account_holder_name
     *
     * @param string|null $issuing_account_holder_name issuing_account_holder_name
     *
     * @return self
     */
    public function setIssuingAccountHolderName($issuing_account_holder_name)
    {
        if (is_null($issuing_account_holder_name)) {
            array_push($this->openAPINullablesSetToNull, 'issuing_account_holder_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('issuing_account_holder_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['issuing_account_holder_name'] = $issuing_account_holder_name;

        return $this;
    }

    /**
     * Gets issuing_account_tax_id
     *
     * @return string|null
     */
    public function getIssuingAccountTaxId()
    {
        return $this->container['issuing_account_tax_id'];
    }

    /**
     * Sets issuing_account_tax_id
     *
     * @param string|null $issuing_account_tax_id issuing_account_tax_id
     *
     * @return self
     */
    public function setIssuingAccountTaxId($issuing_account_tax_id)
    {
        if (is_null($issuing_account_tax_id)) {
            array_push($this->openAPINullablesSetToNull, 'issuing_account_tax_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('issuing_account_tax_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['issuing_account_tax_id'] = $issuing_account_tax_id;

        return $this;
    }

    /**
     * Gets payment_attempts
     *
     * @return mixed[]|null
     */
    public function getPaymentAttempts()
    {
        return $this->container['payment_attempts'];
    }

    /**
     * Sets payment_attempts
     *
     * @param mixed[]|null $payment_attempts payment_attempts
     *
     * @return self
     */
    public function setPaymentAttempts($payment_attempts)
    {
        if (is_null($payment_attempts)) {
            throw new \InvalidArgumentException('non-nullable payment_attempts cannot be null');
        }
        $this->container['payment_attempts'] = $payment_attempts;

        return $this;
    }

    /**
     * Gets receiving_account_holder_name
     *
     * @return string|null
     */
    public function getReceivingAccountHolderName()
    {
        return $this->container['receiving_account_holder_name'];
    }

    /**
     * Sets receiving_account_holder_name
     *
     * @param string|null $receiving_account_holder_name receiving_account_holder_name
     *
     * @return self
     */
    public function setReceivingAccountHolderName($receiving_account_holder_name)
    {
        if (is_null($receiving_account_holder_name)) {
            array_push($this->openAPINullablesSetToNull, 'receiving_account_holder_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('receiving_account_holder_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['receiving_account_holder_name'] = $receiving_account_holder_name;

        return $this;
    }

    /**
     * Gets receiving_account_number
     *
     * @return string|null
     */
    public function getReceivingAccountNumber()
    {
        return $this->container['receiving_account_number'];
    }

    /**
     * Sets receiving_account_number
     *
     * @param string|null $receiving_account_number receiving_account_number
     *
     * @return self
     */
    public function setReceivingAccountNumber($receiving_account_number)
    {
        if (is_null($receiving_account_number)) {
            throw new \InvalidArgumentException('non-nullable receiving_account_number cannot be null');
        }
        $this->container['receiving_account_number'] = $receiving_account_number;

        return $this;
    }

    /**
     * Gets receiving_account_bank
     *
     * @return string|null
     */
    public function getReceivingAccountBank()
    {
        return $this->container['receiving_account_bank'];
    }

    /**
     * Sets receiving_account_bank
     *
     * @param string|null $receiving_account_bank receiving_account_bank
     *
     * @return self
     */
    public function setReceivingAccountBank($receiving_account_bank)
    {
        if (is_null($receiving_account_bank)) {
            throw new \InvalidArgumentException('non-nullable receiving_account_bank cannot be null');
        }
        $this->container['receiving_account_bank'] = $receiving_account_bank;

        return $this;
    }

    /**
     * Gets receiving_account_tax_id
     *
     * @return string|null
     */
    public function getReceivingAccountTaxId()
    {
        return $this->container['receiving_account_tax_id'];
    }

    /**
     * Sets receiving_account_tax_id
     *
     * @param string|null $receiving_account_tax_id receiving_account_tax_id
     *
     * @return self
     */
    public function setReceivingAccountTaxId($receiving_account_tax_id)
    {
        if (is_null($receiving_account_tax_id)) {
            array_push($this->openAPINullablesSetToNull, 'receiving_account_tax_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('receiving_account_tax_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['receiving_account_tax_id'] = $receiving_account_tax_id;

        return $this;
    }

    /**
     * Gets reference_number
     *
     * @return string|null
     */
    public function getReferenceNumber()
    {
        return $this->container['reference_number'];
    }

    /**
     * Sets reference_number
     *
     * @param string|null $reference_number reference_number
     *
     * @return self
     */
    public function setReferenceNumber($reference_number)
    {
        if (is_null($reference_number)) {
            array_push($this->openAPINullablesSetToNull, 'reference_number');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('reference_number', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['reference_number'] = $reference_number;

        return $this;
    }

    /**
     * Gets tracking_code
     *
     * @return string|null
     */
    public function getTrackingCode()
    {
        return $this->container['tracking_code'];
    }

    /**
     * Sets tracking_code
     *
     * @param string|null $tracking_code tracking_code
     *
     * @return self
     */
    public function setTrackingCode($tracking_code)
    {
        if (is_null($tracking_code)) {
            array_push($this->openAPINullablesSetToNull, 'tracking_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('tracking_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['tracking_code'] = $tracking_code;

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
     * @param string|null $customer_ip_address customer_ip_address
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


