# # Checkout

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allowed_payment_methods** | **string[]** | Those are the payment methods that will be available for the link |
**expires_at** | **int** | It is the time when the link will expire. It is expressed in seconds since the Unix epoch. The valid range is from 2 to 365 days (the valid range will be taken from the next day of the creation date at 00:01 hrs) |
**monthly_installments_enabled** | **bool** | This flag allows you to specify if months without interest will be active. | [optional]
**monthly_installments_options** | **int[]** | This field allows you to specify the number of months without interest. | [optional]
**name** | **string** | Reason for charge |
**needs_shipping_contact** | **bool** | This flag allows you to fill in the shipping information at checkout. | [optional]
**on_demand_enabled** | **bool** | This flag allows you to specify if the link will be on demand. | [optional]
**order_template** | [**\Conekta\Model\CheckoutOrderTemplate**](CheckoutOrderTemplate.md) |  |
**payments_limit_count** | **int** | It is the number of payments that can be made through the link. | [optional]
**recurrent** | **bool** | false: single use. true: multiple payments |
**type** | **string** | It is the type of link that will be created. It must be a valid type. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
