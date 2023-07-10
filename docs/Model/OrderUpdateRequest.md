# # OrderUpdateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**charges** | [**\Conekta\Model\ChargeRequest[]**](ChargeRequest.md) |  | [optional]
**checkout** | [**\Conekta\Model\CheckoutRequest**](CheckoutRequest.md) |  | [optional]
**currency** | **string** | Currency with which the payment will be made. It uses the 3-letter code of the [International Standard ISO 4217.](https://es.wikipedia.org/wiki/ISO_4217) | [optional]
**customer_info** | [**\Conekta\Model\OrderUpdateRequestCustomerInfo**](OrderUpdateRequestCustomerInfo.md) |  | [optional]
**discount_lines** | [**\Conekta\Model\OrderDiscountLinesRequest[]**](OrderDiscountLinesRequest.md) | List of [discounts](https://developers.conekta.com/v2.1.0/reference/orderscreatediscountline) that are applied to the order. You must have at least one discount. | [optional]
**line_items** | [**\Conekta\Model\Product[]**](Product.md) | List of [products](https://developers.conekta.com/v2.1.0/reference/orderscreateproduct) that are sold in the order. You must have at least one product. | [optional]
**metadata** | **array<string,string>** |  | [optional]
**pre_authorize** | **bool** | Indicates whether the order charges must be preauthorized | [optional] [default to false]
**shipping_contact** | [**\Conekta\Model\CustomerShippingContacts**](CustomerShippingContacts.md) |  | [optional]
**shipping_lines** | [**\Conekta\Model\ShippingRequest[]**](ShippingRequest.md) | List of [shipping costs](https://developers.conekta.com/v2.1.0/reference/orderscreateshipping). If the online store offers digital products. | [optional]
**tax_lines** | [**\Conekta\Model\OrderTaxRequest[]**](OrderTaxRequest.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
