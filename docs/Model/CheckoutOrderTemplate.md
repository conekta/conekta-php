# # CheckoutOrderTemplate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**currency** | **string** | It is the currency in which the order will be created. It must be a valid ISO 4217 currency code. |
**customer_info** | [**\Conekta\Model\CheckoutOrderTemplateCustomerInfo**](CheckoutOrderTemplateCustomerInfo.md) |  | [optional]
**line_items** | [**\Conekta\Model\Product[]**](Product.md) | They are the products to buy. Each contains the \&quot;unit price\&quot; and \&quot;quantity\&quot; parameters that are used to calculate the total amount of the order. |
**metadata** | **array<string,mixed>** | It is a set of key-value pairs that you can attach to the order. It can be used to store additional information about the order in a structured format. | [optional]
**tax_lines** | [**\Conekta\Model\OrderTaxRequest[]**](OrderTaxRequest.md) | List of [taxes](https://developers.conekta.com/v2.2.0/reference/orderscreatetaxes) that are applied to the order. | [optional]
**discount_lines** | [**\Conekta\Model\OrderDiscountLinesRequest[]**](OrderDiscountLinesRequest.md) | List of [discounts](https://developers.conekta.com/v2.2.0/reference/orderscreatediscountline) that are applied to the order. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
