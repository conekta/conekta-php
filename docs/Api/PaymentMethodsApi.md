# Conekta\PaymentMethodsApi

All URIs are relative to https://api.conekta.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCustomerPaymentMethods()**](PaymentMethodsApi.md#createCustomerPaymentMethods) | **POST** /customers/{id}/payment_sources | Create Payment Method |
| [**deleteCustomerPaymentMethods()**](PaymentMethodsApi.md#deleteCustomerPaymentMethods) | **DELETE** /customers/{id}/payment_sources/{payment_method_id} | Delete Payment Method |
| [**getCustomerPaymentMethods()**](PaymentMethodsApi.md#getCustomerPaymentMethods) | **GET** /customers/{id}/payment_sources | Get Payment Methods |
| [**updateCustomerPaymentMethods()**](PaymentMethodsApi.md#updateCustomerPaymentMethods) | **PUT** /customers/{id}/payment_sources/{payment_method_id} | Update Payment Method |


## `createCustomerPaymentMethods()`

```php
createCustomerPaymentMethods($id, $create_customer_payment_methods_request, $accept_language, $x_child_company_id): \Conekta\Model\CreateCustomerPaymentMethodsResponse
```

Create Payment Method

Create a payment method for a customer.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\PaymentMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$create_customer_payment_methods_request = {type=card, token_id=tok_test_visa_4242}; // \Conekta\Model\CreateCustomerPaymentMethodsRequest | requested field for customer payment methods
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->createCustomerPaymentMethods($id, $create_customer_payment_methods_request, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentMethodsApi->createCustomerPaymentMethods: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **create_customer_payment_methods_request** | [**\Conekta\Model\CreateCustomerPaymentMethodsRequest**](../Model/CreateCustomerPaymentMethodsRequest.md)| requested field for customer payment methods | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\CreateCustomerPaymentMethodsResponse**](../Model/CreateCustomerPaymentMethodsResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteCustomerPaymentMethods()`

```php
deleteCustomerPaymentMethods($id, $payment_method_id, $accept_language, $x_child_company_id): \Conekta\Model\UpdateCustomerPaymentMethodsResponse
```

Delete Payment Method

Delete an existing payment method

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\PaymentMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$payment_method_id = src_2tQ974hSHcsdeSZHG; // string | Identifier of the payment method
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->deleteCustomerPaymentMethods($id, $payment_method_id, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentMethodsApi->deleteCustomerPaymentMethods: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **payment_method_id** | **string**| Identifier of the payment method | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\UpdateCustomerPaymentMethodsResponse**](../Model/UpdateCustomerPaymentMethodsResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCustomerPaymentMethods()`

```php
getCustomerPaymentMethods($id, $accept_language, $x_child_company_id, $limit, $next, $previous, $search): \Conekta\Model\GetPaymentMethodResponse
```

Get Payment Methods

Get a list of Payment Methods

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\PaymentMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.
$limit = 20; // int | The numbers of items to return, the maximum value is 250
$next = 'next_example'; // string | next page
$previous = 'previous_example'; // string | previous page
$search = 'search_example'; // string | General order search, e.g. by mail, reference etc.

try {
    $result = $apiInstance->getCustomerPaymentMethods($id, $accept_language, $x_child_company_id, $limit, $next, $previous, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentMethodsApi->getCustomerPaymentMethods: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |
| **limit** | **int**| The numbers of items to return, the maximum value is 250 | [optional] [default to 20] |
| **next** | **string**| next page | [optional] |
| **previous** | **string**| previous page | [optional] |
| **search** | **string**| General order search, e.g. by mail, reference etc. | [optional] |

### Return type

[**\Conekta\Model\GetPaymentMethodResponse**](../Model/GetPaymentMethodResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCustomerPaymentMethods()`

```php
updateCustomerPaymentMethods($id, $payment_method_id, $update_payment_methods, $accept_language, $x_child_company_id): \Conekta\Model\UpdateCustomerPaymentMethodsResponse
```

Update Payment Method

Gets a payment Method that corresponds to a customer ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\PaymentMethodsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$payment_method_id = src_2tQ974hSHcsdeSZHG; // string | Identifier of the payment method
$update_payment_methods = new \Conekta\Model\UpdatePaymentMethods(); // \Conekta\Model\UpdatePaymentMethods | requested field for customer payment methods
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->updateCustomerPaymentMethods($id, $payment_method_id, $update_payment_methods, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentMethodsApi->updateCustomerPaymentMethods: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **payment_method_id** | **string**| Identifier of the payment method | |
| **update_payment_methods** | [**\Conekta\Model\UpdatePaymentMethods**](../Model/UpdatePaymentMethods.md)| requested field for customer payment methods | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\UpdateCustomerPaymentMethodsResponse**](../Model/UpdateCustomerPaymentMethodsResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
