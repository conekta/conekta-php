# # UpdateCustomer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**antifraud_info** | [**\Conekta\Model\UpdateCustomerAntifraudInfo**](UpdateCustomerAntifraudInfo.md) |  | [optional]
**default_payment_source_id** | **string** | It is a parameter that allows to identify in the response, the Conekta ID of a payment method (payment_id) | [optional]
**email** | **string** | An email address is a series of customizable characters followed by a universal Internet symbol, the at symbol (@), the name of a host server, and a web domain ending (.mx, .com, .org, . net, etc). | [optional]
**name** | **string** | Client&#39;s name | [optional]
**phone** | **string** | Is the customer&#39;s phone number | [optional]
**plan_id** | **string** | Contains the ID of a plan, which could together with name, email and phone create a client directly to a subscription | [optional]
**default_shipping_contact_id** | **string** | It is a parameter that allows to identify in the response, the Conekta ID of the shipping address (shipping_contact) | [optional]
**corporate** | **bool** | It is a value that allows identifying if the email is corporate or not. | [optional] [default to false]
**custom_reference** | **string** | It is an undefined value. | [optional]
**fiscal_entities** | [**\Conekta\Model\CustomerFiscalEntitiesRequest[]**](CustomerFiscalEntitiesRequest.md) |  | [optional]
**metadata** | **array<string,mixed>** |  | [optional]
**payment_sources** | [**\Conekta\Model\CustomerPaymentMethodsRequest[]**](CustomerPaymentMethodsRequest.md) | Contains details of the payment methods that the customer has active or has used in Conekta | [optional]
**shipping_contacts** | [**\Conekta\Model\CustomerShippingContacts[]**](CustomerShippingContacts.md) | Contains the detail of the shipping addresses that the client has active or has used in Conekta | [optional]
**subscription** | [**\Conekta\Model\SubscriptionRequest**](SubscriptionRequest.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
