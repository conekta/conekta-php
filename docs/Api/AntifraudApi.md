# Conekta\AntifraudApi

All URIs are relative to https://api.conekta.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createRuleBlacklist()**](AntifraudApi.md#createRuleBlacklist) | **POST** /antifraud/blacklists | Create blacklisted rule |
| [**createRuleWhitelist()**](AntifraudApi.md#createRuleWhitelist) | **POST** /antifraud/whitelists | Create whitelisted rule |
| [**deleteRuleBlacklist()**](AntifraudApi.md#deleteRuleBlacklist) | **DELETE** /antifraud/blacklists/{id} | Delete blacklisted rule |
| [**deleteRuleWhitelist()**](AntifraudApi.md#deleteRuleWhitelist) | **DELETE** /antifraud/whitelists/{id} | Delete whitelisted rule |
| [**getRuleBlacklist()**](AntifraudApi.md#getRuleBlacklist) | **GET** /antifraud/blacklists | Get list of blacklisted rules |
| [**getRuleWhitelist()**](AntifraudApi.md#getRuleWhitelist) | **GET** /antifraud/whitelists | Get a list of whitelisted rules |


## `createRuleBlacklist()`

```php
createRuleBlacklist($create_risk_rules_data, $accept_language): \Conekta\Model\BlacklistRuleResponse
```

Create blacklisted rule

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\AntifraudApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_risk_rules_data = new \Conekta\Model\CreateRiskRulesData(); // \Conekta\Model\CreateRiskRulesData | requested field for blacklist rule
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->createRuleBlacklist($create_risk_rules_data, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AntifraudApi->createRuleBlacklist: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_risk_rules_data** | [**\Conekta\Model\CreateRiskRulesData**](../Model/CreateRiskRulesData.md)| requested field for blacklist rule | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\BlacklistRuleResponse**](../Model/BlacklistRuleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createRuleWhitelist()`

```php
createRuleWhitelist($accept_language, $create_risk_rules_data): \Conekta\Model\WhitelistlistRuleResponse
```

Create whitelisted rule

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\AntifraudApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_language = es; // string | Use for knowing which language to use
$create_risk_rules_data = new \Conekta\Model\CreateRiskRulesData(); // \Conekta\Model\CreateRiskRulesData

try {
    $result = $apiInstance->createRuleWhitelist($accept_language, $create_risk_rules_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AntifraudApi->createRuleWhitelist: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **create_risk_rules_data** | [**\Conekta\Model\CreateRiskRulesData**](../Model/CreateRiskRulesData.md)|  | [optional] |

### Return type

[**\Conekta\Model\WhitelistlistRuleResponse**](../Model/WhitelistlistRuleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteRuleBlacklist()`

```php
deleteRuleBlacklist($id, $accept_language, $x_child_company_id): \Conekta\Model\DeletedBlacklistRuleResponse
```

Delete blacklisted rule

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\AntifraudApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->deleteRuleBlacklist($id, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AntifraudApi->deleteRuleBlacklist: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\DeletedBlacklistRuleResponse**](../Model/DeletedBlacklistRuleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteRuleWhitelist()`

```php
deleteRuleWhitelist($id, $accept_language, $x_child_company_id): \Conekta\Model\DeletedWhitelistRuleResponse
```

Delete whitelisted rule

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\AntifraudApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$accept_language = es; // string | Use for knowing which language to use
$x_child_company_id = 6441b6376b60c3a638da80af; // string | In the case of a holding company, the company id of the child company to which will process the request.

try {
    $result = $apiInstance->deleteRuleWhitelist($id, $accept_language, $x_child_company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AntifraudApi->deleteRuleWhitelist: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |
| **x_child_company_id** | **string**| In the case of a holding company, the company id of the child company to which will process the request. | [optional] |

### Return type

[**\Conekta\Model\DeletedWhitelistRuleResponse**](../Model/DeletedWhitelistRuleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRuleBlacklist()`

```php
getRuleBlacklist($accept_language): \Conekta\Model\RiskRulesList
```

Get list of blacklisted rules

Return all rules

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\AntifraudApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->getRuleBlacklist($accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AntifraudApi->getRuleBlacklist: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\RiskRulesList**](../Model/RiskRulesList.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRuleWhitelist()`

```php
getRuleWhitelist($accept_language): \Conekta\Model\RiskRulesList
```

Get a list of whitelisted rules

Return all rules

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\AntifraudApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->getRuleWhitelist($accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AntifraudApi->getRuleWhitelist: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\RiskRulesList**](../Model/RiskRulesList.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.1.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
