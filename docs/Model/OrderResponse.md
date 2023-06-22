# # OrderResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **int** | The total amount to be collected in cents | [optional]
**amount_refunded** | **int** | The total amount refunded in cents | [optional]
**channel** | [**\Conekta\Model\ChargeResponseChannel**](ChargeResponseChannel.md) |  | [optional]
**charges** | [**\Conekta\Model\OrderResponseCharges**](OrderResponseCharges.md) |  | [optional]
**checkout** | [**\Conekta\Model\OrderResponseCheckout**](OrderResponseCheckout.md) |  | [optional]
**created_at** | **int** | The time at which the object was created in seconds since the Unix epoch | [optional]
**currency** | **string** | The three-letter ISO 4217 currency code. The currency of the order. | [optional]
**customer_info** | [**\Conekta\Model\OrderResponseCustomerInfo**](OrderResponseCustomerInfo.md) |  | [optional]
**discount_lines** | [**\Conekta\Model\OrderResponseDiscountLines**](OrderResponseDiscountLines.md) |  | [optional]
**fiscal_entity** | [**\Conekta\Model\OrderResponseFiscalEntity**](OrderResponseFiscalEntity.md) |  | [optional]
**id** | **string** |  | [optional]
**is_refundable** | **bool** |  | [optional]
**line_items** | [**\Conekta\Model\OrderResponseProducts**](OrderResponseProducts.md) |  | [optional]
**livemode** | **bool** | Whether the object exists in live mode or test mode | [optional]
**metadata** | **array<string,mixed>** | Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format. | [optional]
**object** | **string** | String representing the object’s type. Objects of the same type share the same value. | [optional]
**payment_status** | **string** | The payment status of the order. | [optional]
**processing_mode** | **string** | Indicates the processing mode for the order, either ecommerce, recurrent or validation. | [optional]
**shipping_contact** | [**\Conekta\Model\OrderResponseShippingContact**](OrderResponseShippingContact.md) |  | [optional]
**updated_at** | **int** | The time at which the object was last updated in seconds since the Unix epoch | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
