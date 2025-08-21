# # ChargeOrderResponsePaymentMethod

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** |  | [optional]
**object** | **string** |  |
**agreement** | **string** | Agreement ID | [optional]
**auth_code** | **string** |  | [optional]
**cashier_id** | **string** |  | [optional]
**reference** | **string** | Reference for the payment |
**barcode_url** | **string** |  | [optional]
**expires_at** | **int** | Expiration date of the charge |
**product_type** | **string** | Product type of the charge |
**service_name** | **string** |  | [optional]
**store** | **string** |  | [optional]
**store_name** | **string** |  | [optional]
**customer_ip_address** | **string** |  | [optional]
**account_type** | **string** | Account type of the card | [optional]
**brand** | **string** | Brand of the card | [optional]
**contract_id** | **string** | Id sent for recurrent charges. | [optional]
**country** | **string** | Country of the card | [optional]
**exp_month** | **string** | Expiration month of the card | [optional]
**exp_year** | **string** | Expiration year of the card | [optional]
**fraud_indicators** | **object[]** |  | [optional]
**issuer** | **string** | Issuer of the card | [optional]
**last4** | **string** | Last 4 digits of the card | [optional]
**name** | **string** | Name of the cardholder | [optional]
**bank** | **string** |  | [optional]
**clabe** | **string** |  | [optional]
**description** | **string** |  | [optional]
**executed_at** | **string** |  | [optional]
**issuing_account_bank** | **string** |  | [optional]
**issuing_account_number** | **string** |  | [optional]
**issuing_account_holder_name** | **string** |  | [optional]
**issuing_account_tax_id** | **string** |  | [optional]
**payment_attempts** | **object[]** |  | [optional]
**receiving_account_holder_name** | **string** |  | [optional]
**receiving_account_number** | **string** |  | [optional]
**receiving_account_bank** | **string** |  | [optional]
**receiving_account_tax_id** | **string** |  | [optional]
**reference_number** | **string** |  | [optional]
**tracking_code** | **string** |  | [optional]
**cancel_url** | **string** | URL to redirect the customer after a canceled payment | [optional]
**failure_url** | **string** | URL to redirect the customer after a failed payment | [optional]
**redirect_url** | **string** | URL to redirect the customer to complete the payment |
**success_url** | **string** | URL to redirect the customer after a successful payment | [optional]
**deep_link** | **string** | Deep link for the payment, use for mobile apps/flows |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
