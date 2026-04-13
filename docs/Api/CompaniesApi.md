# Conekta\CompaniesApi

All URIs are relative to https://api.conekta.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCompany()**](CompaniesApi.md#createCompany) | **POST** /companies | Create Company |
| [**getCompanies()**](CompaniesApi.md#getCompanies) | **GET** /companies | Get List of Companies |
| [**getCompany()**](CompaniesApi.md#getCompany) | **GET** /companies/{id} | Get Company |
| [**getCompanyDocuments()**](CompaniesApi.md#getCompanyDocuments) | **GET** /companies/{company_id}/documents | Get Company Documents |
| [**getCurrentCompany()**](CompaniesApi.md#getCurrentCompany) | **GET** /companies/current | Get Current Company |
| [**updateCompanyDocument()**](CompaniesApi.md#updateCompanyDocument) | **PATCH** /companies/{company_id}/document | Update Company Document |
| [**uploadCompanyDocument()**](CompaniesApi.md#uploadCompanyDocument) | **POST** /companies/{company_id}/document | Upload Company Document |


## `createCompany()`

```php
createCompany($create_company_request): \Conekta\Model\CompanyResponse
```

Create Company

Create a new company.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\CompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_company_request = new \Conekta\Model\CreateCompanyRequest(); // \Conekta\Model\CreateCompanyRequest | Company data

try {
    $result = $apiInstance->createCompany($create_company_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesApi->createCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_company_request** | [**\Conekta\Model\CreateCompanyRequest**](../Model/CreateCompanyRequest.md)| Company data | |

### Return type

[**\Conekta\Model\CompanyResponse**](../Model/CompanyResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanies()`

```php
getCompanies($accept_language, $limit, $search, $next, $previous): \Conekta\Model\GetCompaniesResponse
```

Get List of Companies

Consume the list of child companies.  This is used for holding companies with several child entities.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\CompaniesApi(
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
    $result = $apiInstance->getCompanies($accept_language, $limit, $search, $next, $previous);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesApi->getCompanies: ', $e->getMessage(), PHP_EOL;
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

[**\Conekta\Model\GetCompaniesResponse**](../Model/GetCompaniesResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompany()`

```php
getCompany($id, $accept_language): \Conekta\Model\CompanyResponse
```

Get Company

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\CompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 6307a60c41de27127515a575; // string | Identifier of the resource
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->getCompany($id, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesApi->getCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Identifier of the resource | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\CompanyResponse**](../Model/CompanyResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyDocuments()`

```php
getCompanyDocuments($company_id, $accept_language): \Conekta\Model\CompanyDocumentResponse[]
```

Get Company Documents

Retrieve a list of documents associated with a specific company.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\CompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 6307a60c41de27127515a575; // string | The unique identifier of the company.
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->getCompanyDocuments($company_id, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesApi->getCompanyDocuments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **string**| The unique identifier of the company. | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\CompanyDocumentResponse[]**](../Model/CompanyDocumentResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCurrentCompany()`

```php
getCurrentCompany($accept_language): \Conekta\Model\CompanyResponse
```

Get Current Company

Retrieves information about the currently authenticated company. This endpoint returns the same data as the standard company endpoint but automatically uses the current company's context.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\CompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->getCurrentCompany($accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesApi->getCurrentCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\CompanyResponse**](../Model/CompanyResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCompanyDocument()`

```php
updateCompanyDocument($company_id, $company_document_request, $accept_language): \Conekta\Model\CompanyDocumentResponse
```

Update Company Document

Updates an existing document associated with a specific company.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\CompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 6827206b1ec60400015eb09a; // string | The unique identifier of the company.
$company_document_request = new \Conekta\Model\CompanyDocumentRequest(); // \Conekta\Model\CompanyDocumentRequest | Document information to update.
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->updateCompanyDocument($company_id, $company_document_request, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesApi->updateCompanyDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **string**| The unique identifier of the company. | |
| **company_document_request** | [**\Conekta\Model\CompanyDocumentRequest**](../Model/CompanyDocumentRequest.md)| Document information to update. | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\CompanyDocumentResponse**](../Model/CompanyDocumentResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadCompanyDocument()`

```php
uploadCompanyDocument($company_id, $company_document_request, $accept_language): \Conekta\Model\CompanyDocumentResponse
```

Upload Company Document

Uploads a document associated with a specific company.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\CompaniesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 6827206b1ec60400015eb09a; // string | The unique identifier of the company.
$company_document_request = new \Conekta\Model\CompanyDocumentRequest(); // \Conekta\Model\CompanyDocumentRequest | Document information to upload.
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->uploadCompanyDocument($company_id, $company_document_request, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompaniesApi->uploadCompanyDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **string**| The unique identifier of the company. | |
| **company_document_request** | [**\Conekta\Model\CompanyDocumentRequest**](../Model/CompanyDocumentRequest.md)| Document information to upload. | |
| **accept_language** | **string**| Use for knowing which language to use | [optional] [default to &#39;es&#39;] |

### Return type

[**\Conekta\Model\CompanyDocumentResponse**](../Model/CompanyDocumentResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.conekta-v2.2.0+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
