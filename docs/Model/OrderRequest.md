# # OrderRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**charges** | [**\Conekta\Model\ChargeRequest[]**](ChargeRequest.md) | List of [charges](https://developers.conekta.com/v2.2.0/reference/orderscreatecharge) that are applied to the order | [optional]
**checkout** | [**\Conekta\Model\CheckoutRequest**](CheckoutRequest.md) |  | [optional]
**currency** | **string** | Currency with which the payment will be made. It uses the 3-letter code of the [International Standard ISO 4217.](https://es.wikipedia.org/wiki/ISO_4217) |
**customer_info** | [**\Conekta\Model\OrderRequestCustomerInfo**](OrderRequestCustomerInfo.md) |  |
**discount_lines** | [**\Conekta\Model\OrderDiscountLinesRequest[]**](OrderDiscountLinesRequest.md) | List of [discounts](https://developers.conekta.com/v2.2.0/reference/orderscreatediscountline) that are applied to the order. You must have at least one discount. | [optional]
**fiscal_entity** | [**\Conekta\Model\OrderFiscalEntityRequest**](OrderFiscalEntityRequest.md) |  | [optional]
**line_items** | [**\Conekta\Model\Product[]**](Product.md) | List of [products](https://developers.conekta.com/v2.2.0/reference/orderscreateproduct) that are sold in the order. You must have at least one product. |
**metadata** | **array<string,mixed>** | Metadata associated with the order | [optional]
**needs_shipping_contact** | **bool** | Allows you to fill out the shipping information at checkout | [optional]
**pre_authorize** | **bool** | Indicates whether the order charges must be preauthorized | [optional] [default to false]
**processing_mode** | **string** | Indicates the processing mode for the order, either ecommerce, recurrent or validation. | [optional]
**return_url** | **string** | Indicates the redirection callback upon completion of the 3DS2 flow. Do not use this parameter if your order has a checkout parameter | [optional]
**shipping_contact** | [**\Conekta\Model\CustomerShippingContacts**](CustomerShippingContacts.md) |  | [optional]
**shipping_lines** | [**\Conekta\Model\ShippingRequest[]**](ShippingRequest.md) | List of [shipping costs](https://developers.conekta.com/v2.2.0/reference/orderscreateshipping). If the online store offers digital products. | [optional]
**tax_lines** | [**\Conekta\Model\OrderTaxRequest[]**](OrderTaxRequest.md) | List of [taxes](https://developers.conekta.com/v2.2.0/reference/orderscreatetaxes) that are applied to the order. | [optional]
**three_ds_mode** | **string** | Indicates the 3DS2 mode for the order, either smart or strict. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
