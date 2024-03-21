# # PayoutOrder

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allowed_payout_methods** | **string[]** | The payout methods that are allowed for the payout order. |
**amount** | **int** | The amount of the payout order. |
**currency** | **string** | The currency in which the payout order is made. | [default to 'MXN']
**customer_info** | [**\Conekta\Model\CustomerInfoJustCustomerId**](CustomerInfoJustCustomerId.md) |  |
**metadata** | **array<string,mixed>** | The metadata of the payout order. | [optional]
**payout** | [**\Conekta\Model\Payout**](Payout.md) |  |
**reason** | **string** | The reason for the payout order. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
