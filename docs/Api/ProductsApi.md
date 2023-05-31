# Conekta\ProductsApi

All URIs are relative to https://api.conekta.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**ordersCreateProduct()**](ProductsApi.md#ordersCreateProduct) | **POST** /orders/{id}/line_items | Create Product |
| [**ordersDeleteProduct()**](ProductsApi.md#ordersDeleteProduct) | **DELETE** /orders/{id}/line_items/{line_item_id} | Delete Product |
| [**ordersUpdateProduct()**](ProductsApi.md#ordersUpdateProduct) | **PUT** /orders/{id}/line_items/{line_item_id} | Update Product |


## `ordersCreateProduct()`

```php
ordersCreateProduct($id, $product, $accept_language, $x_child_company_id): \Conekta\Model\ProductOrderResponse
```

Create Product

Create a new product for an existing order.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$product = new \Conekta\Model\Product(); // \Conekta\Model\Product | requested field for a product
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->ordersCreateProduct($id, $product, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->ordersCreateProduct: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **product** | [**\Conekta\Model\Product**](../Model/Product.md)| requested field for a product | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\ProductOrderResponse**](../Model/ProductOrderResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ordersDeleteProduct()`

```php
ordersDeleteProduct($id, $line_item_id, $accept_language, $x_child_company_id): \Conekta\Model\ProductOrderResponse
```

Delete Product

Delete product for an existing orden

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$line_item_id = line_item_2tQ8HkkfbauaKP9Ho; // string | identifier
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->ordersDeleteProduct($id, $line_item_id, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->ordersDeleteProduct: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **line_item_id** | **string**| identifier | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\ProductOrderResponse**](../Model/ProductOrderResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ordersUpdateProduct()`

```php
ordersUpdateProduct($id, $line_item_id, $update_product, $accept_language, $x_child_company_id): \Conekta\Model\ProductOrderResponse
```

Update Product

Update an existing product for an existing orden

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$line_item_id = line_item_2tQ8HkkfbauaKP9Ho; // string | identifier
$update_product = new \Conekta\Model\UpdateProduct(); // \Conekta\Model\UpdateProduct | requested field for products
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->ordersUpdateProduct($id, $line_item_id, $update_product, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->ordersUpdateProduct: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **line_item_id** | **string**| identifier | |
| **update_product** | [**\Conekta\Model\UpdateProduct**](../Model/UpdateProduct.md)| requested field for products | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\ProductOrderResponse**](../Model/ProductOrderResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
