# # ApiKeyCreateResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**authentication_token** | **string** | It is occupied as a user when authenticated with basic authentication, with a blank password. This value will only appear once, in the request to create a new key. Copy and save it in a safe place. | [optional]
**active** | **bool** | Indicates if the api key is active | [optional]
**created_at** | **int** | Unix timestamp in seconds of when the api key was created | [optional]
**updated_at** | **int** | Unix timestamp in seconds of when the api key was last updated | [optional]
**deactivated_at** | **int** | Unix timestamp in seconds of when the api key was deleted | [optional]
**description** | **string** | A name or brief explanation of what this api key is used for | [optional]
**id** | **string** | Unique identifier of the api key | [optional]
**livemode** | **bool** | Indicates if the api key is in production | [optional]
**deleted** | **bool** | Indicates if the api key was deleted | [optional]
**object** | **string** | Object name, value is &#39;api_key&#39; | [optional]
**prefix** | **string** | The first few characters of the authentication_token | [optional]
**role** | **string** | Indicates if the api key is private or public | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
