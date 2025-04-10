# # ChargeResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **int** |  |
**channel** | [**\Conekta\Model\ChargeResponseChannel**](ChargeResponseChannel.md) |  | [optional]
**created_at** | **int** |  |
**currency** | **string** |  |
**customer_id** | **string** |  | [optional]
**description** | **string** |  | [optional]
**device_fingerprint** | **string** |  | [optional]
**failure_code** | **string** |  | [optional]
**failure_message** | **string** |  | [optional]
**id** | **string** | Charge ID |
**livemode** | **bool** | Whether the charge was made in live mode or not |
**object** | **string** |  |
**order_id** | **string** | Order ID |
**paid_at** | **int** | Payment date | [optional]
**payment_method** | [**\Conekta\Model\ChargeResponsePaymentMethod**](ChargeResponsePaymentMethod.md) |  | [optional]
**reference_id** | **string** | Reference ID of the charge | [optional]
**refunds** | [**\Conekta\Model\ChargeResponseRefunds**](ChargeResponseRefunds.md) |  | [optional]
**status** | **string** | Charge status |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
