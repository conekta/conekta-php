# # ChargeRequestPaymentMethod

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Type of payment method |
**cvc** | **string** | Card security code |
**exp_month** | **string** | Card expiration month |
**exp_year** | **string** | Card expiration year |
**name** | **string** | Cardholder name |
**number** | **string** | Card number |
**expires_at** | **int** | Method expiration date as unix timestamp | [optional]
**monthly_installments** | **int** | How many months without interest to apply, it can be 3, 6, 9, 12 or 18 | [optional]
**token_id** | **string** |  | [optional]
**payment_source_id** | **string** |  | [optional]
**contract_id** | **string** | Optional id sent to indicate the bank contract for recurrent card charges. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
