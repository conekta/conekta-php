# # PayoutOrderResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allowed_payout_methods** | **string[]** | The payout methods that are allowed for the payout order. |
**amount** | **int** | The amount of the payout order. |
**created_at** | **int** | The creation date of the payout order. |
**currency** | **string** | The currency in which the payout order is made. | [default to 'MXN']
**customer_info** | [**\Conekta\Model\PayoutOrderResponseCustomerInfo**](PayoutOrderResponseCustomerInfo.md) |  |
**expires_at** | **int** | The expiration date of the payout order. | [optional]
**id** | **string** | The id of the payout order. |
**livemode** | **bool** | The live mode of the payout order. |
**object** | **string** | The object of the payout order. |
**metadata** | **array<string,mixed>** | The metadata of the payout order. | [optional]
**payouts** | [**\Conekta\Model\PayoutOrderPayoutsItem[]**](PayoutOrderPayoutsItem.md) | The payout information of the payout order. |
**reason** | **string** | The reason for the payout order. |
**status** | **string** | The status of the payout order. | [optional]
**updated_at** | **int** | The update date of the payout order. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
