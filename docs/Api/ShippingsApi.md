# Conekta\ShippingsApi

All URIs are relative to https://api.conekta.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**ordersCreateShipping()**](ShippingsApi.md#ordersCreateShipping) | **POST** /orders/{id}/shipping_lines | Create Shipping |
| [**ordersDeleteShipping()**](ShippingsApi.md#ordersDeleteShipping) | **DELETE** /orders/{id}/shipping_lines/{shipping_id} | Delete Shipping |
| [**ordersUpdateShipping()**](ShippingsApi.md#ordersUpdateShipping) | **PUT** /orders/{id}/shipping_lines/{shipping_id} | Update Shipping |


## `ordersCreateShipping()`

```php
ordersCreateShipping($id, $shipping_request, $accept_language, $x_child_company_id): \Conekta\Model\ShippingOrderResponse
```

Create Shipping

Create new shipping for an existing orden

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\ShippingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$shipping_request = new \Conekta\Model\ShippingRequest(); // \Conekta\Model\ShippingRequest | requested field for a shipping
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->ordersCreateShipping($id, $shipping_request, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingsApi->ordersCreateShipping: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **shipping_request** | [**\Conekta\Model\ShippingRequest**](../Model/ShippingRequest.md)| requested field for a shipping | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\ShippingOrderResponse**](../Model/ShippingOrderResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ordersDeleteShipping()`

```php
ordersDeleteShipping($id, $shipping_id, $accept_language, $x_child_company_id): \Conekta\Model\ShippingOrderResponse
```

Delete Shipping

Delete shipping

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\ShippingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$shipping_id = ship_lin_2tQ974hSHcsdeSZHG; // string | identifier
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->ordersDeleteShipping($id, $shipping_id, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingsApi->ordersDeleteShipping: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **shipping_id** | **string**| identifier | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\ShippingOrderResponse**](../Model/ShippingOrderResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ordersUpdateShipping()`

```php
ordersUpdateShipping($id, $shipping_id, $shipping_request, $accept_language, $x_child_company_id): \Conekta\Model\ShippingOrderResponse
```

Update Shipping

Update existing shipping for an existing orden

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\ShippingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$shipping_id = ship_lin_2tQ974hSHcsdeSZHG; // string | identifier
$shipping_request = new \Conekta\Model\ShippingRequest(); // \Conekta\Model\ShippingRequest | requested field for a shipping
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->ordersUpdateShipping($id, $shipping_id, $shipping_request, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingsApi->ordersUpdateShipping: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **shipping_id** | **string**| identifier | |
| **shipping_request** | [**\Conekta\Model\ShippingRequest**](../Model/ShippingRequest.md)| requested field for a shipping | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\ShippingOrderResponse**](../Model/ShippingOrderResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
