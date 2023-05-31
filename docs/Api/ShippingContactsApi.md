# Conekta\ShippingContactsApi

All URIs are relative to https://api.conekta.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCustomerShippingContacts()**](ShippingContactsApi.md#createCustomerShippingContacts) | **POST** /customers/{id}/shipping_contacts | Create a shipping contacts |
| [**deleteCustomerShippingContacts()**](ShippingContactsApi.md#deleteCustomerShippingContacts) | **DELETE** /customers/{id}/shipping_contacts/{shipping_contacts_id} | Delete shipping contacts |
| [**updateCustomerShippingContacts()**](ShippingContactsApi.md#updateCustomerShippingContacts) | **PUT** /customers/{id}/shipping_contacts/{shipping_contacts_id} | Update shipping contacts |


## `createCustomerShippingContacts()`

```php
createCustomerShippingContacts($id, $customer_shipping_contacts, $accept_language, $x_child_company_id): \Conekta\Model\CustomerShippingContactsResponse
```

Create a shipping contacts

Create a shipping contacts for a customer.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\ShippingContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$customer_shipping_contacts = new \Conekta\Model\CustomerShippingContacts(); // \Conekta\Model\CustomerShippingContacts | requested field for customer shippings contacts
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->createCustomerShippingContacts($id, $customer_shipping_contacts, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingContactsApi->createCustomerShippingContacts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **customer_shipping_contacts** | [**\Conekta\Model\CustomerShippingContacts**](../Model/CustomerShippingContacts.md)| requested field for customer shippings contacts | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\CustomerShippingContactsResponse**](../Model/CustomerShippingContactsResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteCustomerShippingContacts()`

```php
deleteCustomerShippingContacts($id, $shipping_contacts_id, $accept_language, $x_child_company_id): \Conekta\Model\CustomerShippingContactsResponse
```

Delete shipping contacts

Delete shipping contact that corresponds to a customer ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\ShippingContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$shipping_contacts_id = 6307a60c41de27127515a575; // string | identifier
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->deleteCustomerShippingContacts($id, $shipping_contacts_id, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingContactsApi->deleteCustomerShippingContacts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **shipping_contacts_id** | **string**| identifier | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\CustomerShippingContactsResponse**](../Model/CustomerShippingContactsResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCustomerShippingContacts()`

```php
updateCustomerShippingContacts($id, $shipping_contacts_id, $customer_update_shipping_contacts, $accept_language, $x_child_company_id): \Conekta\Model\CustomerShippingContactsResponse
```

Update shipping contacts

Update shipping contact that corresponds to a customer ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\ShippingContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$shipping_contacts_id = 6307a60c41de27127515a575; // string | identifier
$customer_update_shipping_contacts = new \Conekta\Model\CustomerUpdateShippingContacts(); // \Conekta\Model\CustomerUpdateShippingContacts | requested field for customer update shippings contacts
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->updateCustomerShippingContacts($id, $shipping_contacts_id, $customer_update_shipping_contacts, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShippingContactsApi->updateCustomerShippingContacts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **shipping_contacts_id** | **string**| identifier | |
| **customer_update_shipping_contacts** | [**\Conekta\Model\CustomerUpdateShippingContacts**](../Model/CustomerUpdateShippingContacts.md)| requested field for customer update shippings contacts | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\CustomerShippingContactsResponse**](../Model/CustomerShippingContactsResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
