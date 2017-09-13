<?php

namespace Conekta;

use \Conekta\ConektaObject;

abstract class Util
{
  public static $types = array(
    'webhook'                     => '\Conekta\Webhook',
    'webhook_log'                 => '\Conekta\WebhookLog',
    'billing_address'             => '\Conekta\Address',
    'bank_transfer_payout_method' => '\Conekta\Method',
    'payout'                      => '\Conekta\Payout',
    'payee'                       => '\Conekta\Payee',
    'payout_method'               => '\Conekta\PayoutMethod',
    'card_payment'                => '\Conekta\PaymentMethod',
    'cash_payment'                => '\Conekta\PaymentMethod',
    'bank_transfer_payment'       => '\Conekta\PaymentMethod',
    'card'                        => '\Conekta\Card',
    'charge'                      => '\Conekta\Charge',
    'customer'                    => '\Conekta\Customer',
    'event'                       => '\Conekta\Event',
    'plan'                        => '\Conekta\Plan',
    'subscription'                => '\Conekta\Subscription',
    'payment_source'              => '\Conekta\PaymentSource',
    'tax_line'                    => '\Conekta\TaxLine',
    'shipping_line'               => '\Conekta\ShippingLine',
    'discount_line'               => '\Conekta\DiscountLine',
    'conekta_list'                => '\Conekta\ConektaList',
    'shipping_contact'            => '\Conekta\ShippingContact',
    'lang'                        => '\Conekta\Lang',
    'line_item'                   => '\Conekta\LineItem',
    'order'                       => '\Conekta\Order',
    'token'                       => '\Conekta\Token'
    );

  public static function convertToConektaObject($resp)
  {
    $types = self::$types;
    if (is_array($resp)) {
      if (isset($resp['object']) && is_string($resp['object']) && isset($types[$resp['object']])) {
        $class = $types[$resp['object']];
        $instance = new $class();
        $instance->loadFromArray($resp);

        return $instance;
      }

      if (isset($resp['street1']) || isset($resp['street2'])) {
        $class = '\Conekta\Address';
        $instance = new $class();
        $instance->loadFromArray($resp);

        return $instance;
      }

      if (current($resp)) {
        $instance = new ConektaObject();
        $instance->loadFromArray($resp);

        return $instance;
      }

      return new ConektaObject();
    }

    return $resp;
  }

  public static function shiftArray($array, $object)
  {
    unset($array[$object]);
    end($array);
    $lastKey = key($array);

    for ($i = $object; $i < $lastKey; ++$i) {
      $array[$i] = $array[$i + 1];
      unset($array[$i + 1]);
    }

    return $array;
  }
}
