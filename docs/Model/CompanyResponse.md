# # CompanyResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The child company&#39;s unique identifier | [optional]
**created_at** | **int** | The resource&#39;s creation date (unix timestamp) | [optional]
**name** | **string** | The child company&#39;s name | [optional]
**object** | **string** | The resource&#39;s type | [optional]
**parent_company_id** | **string** | Id of the parent company | [optional]
**use_parent_fiscal_data** | **bool** | Whether the parent company&#39;s fiscal data is to be used for liquidation and tax purposes | [optional]
**payout_destination** | [**\Conekta\Model\CompanyPayoutDestinationResponse**](CompanyPayoutDestinationResponse.md) |  | [optional]
**fiscal_info** | [**\Conekta\Model\CompanyFiscalInfoResponse**](CompanyFiscalInfoResponse.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
