# Conekta\TokensApi

All URIs are relative to https://api.conekta.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createToken()**](TokensApi.md#createToken) | **POST** /tokens | Create Token |


## `createToken()`

```php
createToken($token_request, $accept_language): \Conekta\Model\TokenResponse
```

Create Token

Generate a payment token, to associate it with a card, Endpoint could be use directly only for PCI compliance account

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$token_request = new \Conekta\Model\TokenRequest(); // \Conekta\Model\TokenRequest | requested field for token
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->createToken($token_request, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->createToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token_request** | [**\Conekta\Model\TokenRequest**](../Model/TokenRequest.md)| requested field for token | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\TokenResponse**](../Model/TokenResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
