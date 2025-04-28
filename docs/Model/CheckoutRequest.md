# # CheckoutRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allowed_payment_methods** | **string[]** | Are the payment methods available for this link. For subscriptions, only &#39;card&#39; is allowed due to the recurring nature of the payments. |
**plan_ids** | **string[]** | List of plan IDs that will be available for subscription. This field is required for subscription payments. | [optional]
**expires_at** | **int** | Unix timestamp of checkout expiration | [optional]
**failure_url** | **string** | Redirection url back to the site in case of failed payment, applies only to HostedPayment. | [optional]
**monthly_installments_enabled** | **bool** |  | [optional]
**monthly_installments_options** | **int[]** |  | [optional]
**max_failed_retries** | **int** | Number of retries allowed before the checkout is marked as failed | [optional]
**name** | **string** | Reason for payment | [optional]
**on_demand_enabled** | **bool** |  | [optional]
**redirection_time** | **int** | number of seconds to wait before redirecting to the success_url | [optional]
**success_url** | **string** | Redirection url back to the site in case of successful payment, applies only to HostedPayment | [optional]
**type** | **string** | This field represents the type of checkout | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
