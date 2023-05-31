# # TransferResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **int** | Amount in cents of the transfer. | [optional]
**created_at** | **int** | Date and time of creation of the transfer in Unix format. | [optional]
**currency** | **string** | The currency of the transfer. It uses the 3-letter code of the [International Standard ISO 4217.](https://es.wikipedia.org/wiki/ISO_4217) | [optional]
**id** | **string** | Unique identifier of the transfer. | [optional]
**livemode** | **bool** | Indicates whether the transfer was created in live mode or test mode. | [optional]
**destination** | [**\Conekta\Model\TransferDestinationResponse**](TransferDestinationResponse.md) |  | [optional]
**object** | **string** | Object name, which is transfer. | [optional]
**statement_description** | **string** | Description of the transfer. | [optional]
**statement_reference** | **string** | Reference number of the transfer. | [optional]
**status** | **string** | Code indicating transfer status. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
