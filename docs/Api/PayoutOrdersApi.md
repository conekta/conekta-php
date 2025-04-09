# Conekta\PayoutOrdersApi

All URIs are relative to https://api.conekta.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelPayoutOrderById()**](PayoutOrdersApi.md#cancelPayoutOrderById) | **PUT** /payout_orders/{id}/cancel | Cancel Payout Order |
| [**createPayoutOrder()**](PayoutOrdersApi.md#createPayoutOrder) | **POST** /payout_orders | Create payout order |
| [**getPayoutOrderById()**](PayoutOrdersApi.md#getPayoutOrderById) | **GET** /payout_orders/{id} | Get Payout Order |
| [**getPayoutOrders()**](PayoutOrdersApi.md#getPayoutOrders) | **GET** /payout_orders | Get a list of Payout Orders |


## `cancelPayoutOrderById()`

```php
cancelPayoutOrderById($id, $accept_language): \Conekta\Model\PayoutOrderResponse
```

Cancel Payout Order

Cancel a payout Order resource that corresponds to a payout order ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\PayoutOrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->cancelPayoutOrderById($id, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutOrdersApi->cancelPayoutOrderById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\PayoutOrderResponse**](../Model/PayoutOrderResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createPayoutOrder()`

```php
createPayoutOrder($payout_order, $accept_language): \Conekta\Model\PayoutOrderResponse
```

Create payout order

Create a new payout order.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\PayoutOrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_order = new \Conekta\Model\PayoutOrder(); // \Conekta\Model\PayoutOrder | requested field for payout order
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->createPayoutOrder($payout_order, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutOrdersApi->createPayoutOrder: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payout_order** | [**\Conekta\Model\PayoutOrder**](../Model/PayoutOrder.md)| requested field for payout order | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\PayoutOrderResponse**](../Model/PayoutOrderResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayoutOrderById()`

```php
getPayoutOrderById($id, $accept_language): \Conekta\Model\PayoutOrderResponse
```

Get Payout Order

Gets a payout Order resource that corresponds to a payout order ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\PayoutOrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->getPayoutOrderById($id, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutOrdersApi->getPayoutOrderById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\PayoutOrderResponse**](../Model/PayoutOrderResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayoutOrders()`

```php
getPayoutOrders($accept_language, $limit, $search, $next, $previous): \Conekta\Model\PayoutOrdersResponse
```

Get a list of Payout Orders

Get Payout order details in the form of a list

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\PayoutOrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_language = es; // string | Use for knowing which language to use
$limit = 20; // int | The numbers of items to return, the maximum value is 250
$search = 'search_example'; // string | General order search, e.g. by mail, reference etc.
$next = 'next_example'; // string | next page
$previous = 'previous_example'; // string | previous page

try {
    $result = $apiInstance->getPayoutOrders($accept_language, $limit, $search, $next, $previous);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutOrdersApi->getPayoutOrders: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **limit** | **int**| The numbers of items to return, the maximum value is 250 | [optional] [default to 20] |
| **search** | **string**| General order search, e.g. by mail, reference etc. | [optional] |
| **next** | **string**| next page | [optional] |
| **previous** | **string**| previous page | [optional] |

### Return type

[**\Conekta\Model\PayoutOrdersResponse**](../Model/PayoutOrdersResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
