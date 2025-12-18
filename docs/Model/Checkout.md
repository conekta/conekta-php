# # Checkout

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allowed_payment_methods** | **string[]** | Those are the payment methods that will be available for the link |
**exclude_card_networks** | **string[]** | List of card networks to exclude from the checkout. This field is only applicable for card payments. | [optional]
**expires_at** | **int** | It is the time when the link will expire.  It is expressed in seconds since the Unix epoch. The valid range is from 10 minutes to 365 days from the creation date. |
**monthly_installments_enabled** | **bool** | This flag allows you to specify if months without interest will be active. | [optional]
**monthly_installments_options** | **int[]** | This field allows you to specify the number of months without interest. | [optional]
**three_ds_mode** | **string** | Indicates the 3DS2 mode for the order, either smart or strict. This property is only applicable when 3DS is enabled. When 3DS is disabled, this field should be null. | [optional]
**name** | **string** | Reason for charge |
**needs_shipping_contact** | **bool** | This flag allows you to fill in the shipping information at checkout. | [optional]
**on_demand_enabled** | **bool** | This flag allows you to specify if the link will be on demand. | [optional]
**plan_ids** | **string[]** | It is a list of plan IDs that will be associated with the order. | [optional]
**order_template** | [**\Conekta\Model\CheckoutOrderTemplate**](CheckoutOrderTemplate.md) |  |
**payments_limit_count** | **int** | It is the number of payments that can be made through the link. | [optional]
**recurrent** | **bool** | false: single use. true: multiple payments |
**type** | **string** | It is the type of link that will be created. It must be a valid type. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
