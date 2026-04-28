# # OrderResponseCheckout

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allowed_payment_methods** | **string[]** | Are the payment methods available for this link |
**can_not_expire** | **bool** |  | [optional]
**emails_sent** | **int** |  | [optional]
**exclude_card_networks** | **string[]** |  | [optional]
**expires_at** | **int** |  | [optional]
**failure_url** | **string** |  | [optional]
**force_3ds_flow** | **bool** |  | [optional]
**id** | **string** |  |
**is_redirect_on_failure** | **bool** |  | [optional]
**livemode** | **bool** |  | [optional]
**max_failed_retries** | **int** | Number of retries allowed before the checkout is marked as failed | [optional]
**metadata** | **array<string,mixed>** |  | [optional]
**monthly_installments_enabled** | **bool** |  | [optional]
**monthly_installments_options** | **int[]** |  | [optional]
**name** | **string** |  |
**needs_shipping_contact** | **bool** |  | [optional]
**object** | **string** |  |
**on_demand_enabled** | **bool** |  | [optional]
**paid_payments_count** | **int** |  | [optional]
**recurrent** | **bool** |  | [optional]
**redirection_time** | **int** | number of seconds to wait before redirecting to the success_url | [optional]
**slug** | **string** |  | [optional]
**sms_sent** | **int** |  | [optional]
**success_url** | **string** | Redirection url back to the site in case of successful payment, applies only to HostedPayment | [optional]
**starts_at** | **int** |  | [optional]
**status** | **string** |  | [optional]
**type** | **string** | This field represents the type of checkout, which determines the user experience during the payment process. &#39;HostedPayment&#39; will redirect the customer to a Conekta-hosted page to complete the payment, while &#39;Integration&#39; allows the payment process to be handled entirely on your site using Conekta&#39;s APIs and SDKs. |
**url** | **string** | Indicate the url of the Conekta component to complete the payment. For HostedPayment, this will be a Conekta-hosted page | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
