# # ChargeRequestPaymentMethod

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Type of payment method |
**cancel_url** | **string** | URL to redirect the customer after a canceled payment |
**can_not_expire** | **bool** | Indicates if the payment method can not expire |
**failure_url** | **string** | URL to redirect the customer after a failed payment |
**product_type** | **string** | Product type of the payment method, use for the payment method to know the product type |
**success_url** | **string** | URL to redirect the customer after a successful payment |
**cvc** | **string** | Optional, It is a value that allows identifying the security code of the card. Only for PCI merchants |
**exp_month** | **string** | Card expiration month |
**exp_year** | **string** | Card expiration year |
**name** | **string** | Cardholder name |
**number** | **string** | Card number |
**customer_ip_address** | **string** | Optional field used to capture the customer&#39;s IP address for fraud prevention and security monitoring purposes | [optional]
**expires_at** | **int** | Method expiration date as unix timestamp | [optional]
**monthly_installments** | **int** | How many months without interest to apply, it can be 3, 6, 9, 12 or 18 | [optional]
**token_id** | **string** |  | [optional]
**payment_source_id** | **string** |  | [optional]
**contract_id** | **string** | Optional id sent to indicate the bank contract for recurrent card charges. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
