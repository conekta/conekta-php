# # TransactionResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **int** | The amount of the transaction. |
**charge** | **string** | Randomly assigned unique order identifier associated with the charge. |
**created_at** | **int** | Date and time of creation of the transaction in Unix format. |
**currency** | **string** | The currency of the transaction. It uses the 3-letter code of the [International Standard ISO 4217.](https://es.wikipedia.org/wiki/ISO_4217) |
**fee** | **int** | The amount to be deducted for taxes and commissions. |
**id** | **string** | Unique identifier of the transaction. |
**livemode** | **bool** | Indicates whether the transaction was created in live mode or test mode. |
**net** | **int** | The net amount after deducting commissions and taxes. |
**object** | **string** | Object name, which is transaction. |
**status** | **string** | Code indicating transaction status. |
**type** | **string** | Transaction Type |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
