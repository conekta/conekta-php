# Conekta\TaxesApi

All URIs are relative to https://api.conekta.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**ordersCreateTaxes()**](TaxesApi.md#ordersCreateTaxes) | **POST** /orders/{id}/tax_lines | Create Tax |
| [**ordersDeleteTaxes()**](TaxesApi.md#ordersDeleteTaxes) | **DELETE** /orders/{id}/tax_lines/{tax_id} | Delete Tax |
| [**ordersUpdateTaxes()**](TaxesApi.md#ordersUpdateTaxes) | **PUT** /orders/{id}/tax_lines/{tax_id} | Update Tax |


## `ordersCreateTaxes()`

```php
ordersCreateTaxes($id, $order_tax_request, $accept_language, $x_child_company_id): \Conekta\Model\UpdateOrderTaxResponse
```

Create Tax

Create new taxes for an existing orden

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$order_tax_request = new \Conekta\Model\OrderTaxRequest(); // \Conekta\Model\OrderTaxRequest | requested field for a taxes
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->ordersCreateTaxes($id, $order_tax_request, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->ordersCreateTaxes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **order_tax_request** | [**\Conekta\Model\OrderTaxRequest**](../Model/OrderTaxRequest.md)| requested field for a taxes | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\UpdateOrderTaxResponse**](../Model/UpdateOrderTaxResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ordersDeleteTaxes()`

```php
ordersDeleteTaxes($id, $tax_id, $accept_language, $x_child_company_id): \Conekta\Model\UpdateOrderTaxResponse
```

Delete Tax

Delete taxes for an existing orden

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$tax_id = tax_lin_2tQ974hSHcsdeSZHG; // string | identifier
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->ordersDeleteTaxes($id, $tax_id, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->ordersDeleteTaxes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **tax_id** | **string**| identifier | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\UpdateOrderTaxResponse**](../Model/UpdateOrderTaxResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ordersUpdateTaxes()`

```php
ordersUpdateTaxes($id, $tax_id, $update_order_tax_request, $accept_language, $x_child_company_id): \Conekta\Model\UpdateOrderTaxResponse
```

Update Tax

Update taxes for an existing orden

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\TaxesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$tax_id = tax_lin_2tQ974hSHcsdeSZHG; // string | identifier
$update_order_tax_request = new \Conekta\Model\UpdateOrderTaxRequest(); // \Conekta\Model\UpdateOrderTaxRequest | requested field for taxes
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->ordersUpdateTaxes($id, $tax_id, $update_order_tax_request, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TaxesApi->ordersUpdateTaxes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **tax_id** | **string**| identifier | |
| **update_order_tax_request** | [**\Conekta\Model\UpdateOrderTaxRequest**](../Model/UpdateOrderTaxRequest.md)| requested field for taxes | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\UpdateOrderTaxResponse**](../Model/UpdateOrderTaxResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
