# # TokenResponseCheckout

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allowed_payment_methods** | **string[]** |  | [optional]
**can_not_expire** | **bool** | Indicates if the checkout can not expire. | [optional]
**emails_sent** | **int** |  | [optional]
**exclude_card_networks** | **string[]** |  | [optional]
**expires_at** | **int** | Date and time when the checkout expires. | [optional]
**failure_url** | **string** | URL to redirect the customer to if the payment process fails. | [optional]
**force_3ds_flow** | **bool** | Indicates if the checkout forces the 3DS flow. | [optional]
**id** | **string** |  | [optional]
**livemode** | **bool** |  | [optional]
**metadata** | **array<string,mixed>** |  | [optional]
**monthly_installments_enabled** | **bool** | Indicates if the checkout allows monthly installments. | [optional]
**monthly_installments_options** | **int[]** | List of monthly installments options. | [optional]
**name** | **string** |  | [optional]
**needs_shipping_contact** | **bool** |  | [optional]
**object** | **string** | Indicates the type of object, in this case checkout. | [optional]
**on_demand_enabled** | **bool** | Indicates if the checkout allows on demand payments. | [optional]
**paid_payments_count** | **int** | Number of payments that have been paid. | [optional]
**recurrent** | **bool** | Indicates if the checkout is recurrent. | [optional]
**sms_sent** | **int** |  | [optional]
**starts_at** | **int** | Date and time when the checkout starts. | [optional]
**status** | **string** | Status of the checkout. | [optional]
**success_url** | **string** | URL to redirect the customer to after the payment process is completed. | [optional]
**type** | **string** | Type of checkout. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
