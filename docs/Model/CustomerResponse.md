# # CustomerResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**antifraud_info** | [**\Conekta\Model\CustomerAntifraudInfoResponse**](CustomerAntifraudInfoResponse.md) |  | [optional]
**corporate** | **bool** | true if the customer is a company | [optional]
**created_at** | **int** | Creation date of the object |
**custom_reference** | **string** | Custom reference | [optional]
**date_of_birth** | **string** | It is a parameter that allows to identify the date of birth of the client. | [optional]
**default_fiscal_entity_id** | **string** |  | [optional]
**default_shipping_contact_id** | **string** |  | [optional]
**default_payment_source_id** | **string** |  | [optional]
**email** | **string** |  | [optional]
**fiscal_entities** | [**\Conekta\Model\CustomerFiscalEntitiesResponse**](CustomerFiscalEntitiesResponse.md) |  | [optional]
**id** | **string** | Customer&#39;s ID |
**livemode** | **bool** | true if the object exists in live mode or the value false if the object exists in test mode |
**name** | **string** | Customer&#39;s name |
**national_id** | **string** | It is a parameter that allows to identify the national identification number of the client. | [optional]
**metadata** | **array<string,mixed>** |  | [optional]
**object** | **string** |  |
**payment_sources** | [**\Conekta\Model\CustomerPaymentMethodsResponse**](CustomerPaymentMethodsResponse.md) |  | [optional]
**phone** | **string** | Customer&#39;s phone number | [optional]
**shipping_contacts** | [**\Conekta\Model\CustomerResponseShippingContacts**](CustomerResponseShippingContacts.md) |  | [optional]
**subscription** | [**\Conekta\Model\SubscriptionResponse**](SubscriptionResponse.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
