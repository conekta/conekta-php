# # WebhookResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | id of the webhook | [optional]
**description** | **string** | A name or brief explanation of what this webhook is used for | [optional]
**livemode** | **bool** | Indicates if the webhook is in production | [optional]
**active** | **bool** | Indicates if the webhook is actived or not | [optional]
**object** | **string** | Object name, value is &#39;webhook&#39; | [optional]
**status** | **string** | Indicates if the webhook is ready to receive events or failing | [optional]
**subscribed_events** | **string[]** | lists the events that will be sent to the webhook | [optional]
**url** | **string** | url or endpoint of the webhook | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
