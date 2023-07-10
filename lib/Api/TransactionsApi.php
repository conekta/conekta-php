<?php
/**
 * TransactionsApi
 * PHP version 7.4
 *
 * @category Class
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Conekta API
 *
 * Conekta sdk
 *
 * The version of the OpenAPI document: 2.1.0
 * Contact: engineering@conekta.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.6.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Conekta\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Conekta\ApiException;
use Conekta\Configuration;
use Conekta\HeaderSelector;
use Conekta\ObjectSerializer;

/**
 * TransactionsApi Class Doc Comment
 *
 * @category Class
 * @package  Conekta
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class TransactionsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'getTransaction' => [
            'application/json',
        ],
        'getTransactions' => [
            'application/json',
        ],
    ];

/**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getTransaction
     *
     * Get transaction
     *
     * @param  string $id Identifier of the resource (required)
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransaction'] to see the possible values for this operation
     *
     * @throws \Conekta\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Conekta\Model\TransactionResponse|\Conekta\Model\Error|\Conekta\Model\Error|\Conekta\Model\Error
     */
    public function getTransaction($id, $accept_language = 'es', $x_child_company_id = null, string $contentType = self::contentTypes['getTransaction'][0])
    {
        list($response) = $this->getTransactionWithHttpInfo($id, $accept_language, $x_child_company_id, $contentType);
        return $response;
    }

    /**
     * Operation getTransactionWithHttpInfo
     *
     * Get transaction
     *
     * @param  string $id Identifier of the resource (required)
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransaction'] to see the possible values for this operation
     *
     * @throws \Conekta\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Conekta\Model\TransactionResponse|\Conekta\Model\Error|\Conekta\Model\Error|\Conekta\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTransactionWithHttpInfo($id, $accept_language = 'es', $x_child_company_id = null, string $contentType = self::contentTypes['getTransaction'][0])
    {
        $request = $this->getTransactionRequest($id, $accept_language, $x_child_company_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Conekta\Model\TransactionResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Conekta\Model\TransactionResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Conekta\Model\TransactionResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Conekta\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Conekta\Model\Error' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Conekta\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Conekta\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Conekta\Model\Error' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Conekta\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Conekta\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Conekta\Model\Error' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Conekta\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Conekta\Model\TransactionResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Conekta\Model\TransactionResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Conekta\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Conekta\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Conekta\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTransactionAsync
     *
     * Get transaction
     *
     * @param  string $id Identifier of the resource (required)
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransaction'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTransactionAsync($id, $accept_language = 'es', $x_child_company_id = null, string $contentType = self::contentTypes['getTransaction'][0])
    {
        return $this->getTransactionAsyncWithHttpInfo($id, $accept_language, $x_child_company_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTransactionAsyncWithHttpInfo
     *
     * Get transaction
     *
     * @param  string $id Identifier of the resource (required)
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransaction'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTransactionAsyncWithHttpInfo($id, $accept_language = 'es', $x_child_company_id = null, string $contentType = self::contentTypes['getTransaction'][0])
    {
        $returnType = '\Conekta\Model\TransactionResponse';
        $request = $this->getTransactionRequest($id, $accept_language, $x_child_company_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTransaction'
     *
     * @param  string $id Identifier of the resource (required)
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransaction'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getTransactionRequest($id, $accept_language = 'es', $x_child_company_id = null, string $contentType = self::contentTypes['getTransaction'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getTransaction'
            );
        }




        $resourcePath = '/transactions/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = ObjectSerializer::toHeaderValue($accept_language);
        }
        // header params
        if ($x_child_company_id !== null) {
            $headerParams['X-Child-Company-Id'] = ObjectSerializer::toHeaderValue($x_child_company_id);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/vnd.conekta-v2.1.0+json', ],
            $contentType,
            $multipart
        );
        $headers = array_merge(
            $this->headerSelector->getConektaUserAgent(),
            $headers
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTransactions
     *
     * Get List transactions
     *
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  int $limit The numbers of items to return, the maximum value is 250 (optional, default to 20)
     * @param  string $search General order search, e.g. by mail, reference etc. (optional)
     * @param  string $next next page (optional)
     * @param  string $previous previous page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransactions'] to see the possible values for this operation
     *
     * @throws \Conekta\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Conekta\Model\GetTransactionsResponse|\Conekta\Model\Error|\Conekta\Model\Error
     */
    public function getTransactions($accept_language = 'es', $x_child_company_id = null, $limit = 20, $search = null, $next = null, $previous = null, string $contentType = self::contentTypes['getTransactions'][0])
    {
        list($response) = $this->getTransactionsWithHttpInfo($accept_language, $x_child_company_id, $limit, $search, $next, $previous, $contentType);
        return $response;
    }

    /**
     * Operation getTransactionsWithHttpInfo
     *
     * Get List transactions
     *
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  int $limit The numbers of items to return, the maximum value is 250 (optional, default to 20)
     * @param  string $search General order search, e.g. by mail, reference etc. (optional)
     * @param  string $next next page (optional)
     * @param  string $previous previous page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransactions'] to see the possible values for this operation
     *
     * @throws \Conekta\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Conekta\Model\GetTransactionsResponse|\Conekta\Model\Error|\Conekta\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTransactionsWithHttpInfo($accept_language = 'es', $x_child_company_id = null, $limit = 20, $search = null, $next = null, $previous = null, string $contentType = self::contentTypes['getTransactions'][0])
    {
        $request = $this->getTransactionsRequest($accept_language, $x_child_company_id, $limit, $search, $next, $previous, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Conekta\Model\GetTransactionsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Conekta\Model\GetTransactionsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Conekta\Model\GetTransactionsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Conekta\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Conekta\Model\Error' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Conekta\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Conekta\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Conekta\Model\Error' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Conekta\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Conekta\Model\GetTransactionsResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Conekta\Model\GetTransactionsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Conekta\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Conekta\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTransactionsAsync
     *
     * Get List transactions
     *
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  int $limit The numbers of items to return, the maximum value is 250 (optional, default to 20)
     * @param  string $search General order search, e.g. by mail, reference etc. (optional)
     * @param  string $next next page (optional)
     * @param  string $previous previous page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransactions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTransactionsAsync($accept_language = 'es', $x_child_company_id = null, $limit = 20, $search = null, $next = null, $previous = null, string $contentType = self::contentTypes['getTransactions'][0])
    {
        return $this->getTransactionsAsyncWithHttpInfo($accept_language, $x_child_company_id, $limit, $search, $next, $previous, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTransactionsAsyncWithHttpInfo
     *
     * Get List transactions
     *
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  int $limit The numbers of items to return, the maximum value is 250 (optional, default to 20)
     * @param  string $search General order search, e.g. by mail, reference etc. (optional)
     * @param  string $next next page (optional)
     * @param  string $previous previous page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransactions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTransactionsAsyncWithHttpInfo($accept_language = 'es', $x_child_company_id = null, $limit = 20, $search = null, $next = null, $previous = null, string $contentType = self::contentTypes['getTransactions'][0])
    {
        $returnType = '\Conekta\Model\GetTransactionsResponse';
        $request = $this->getTransactionsRequest($accept_language, $x_child_company_id, $limit, $search, $next, $previous, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTransactions'
     *
     * @param  string $accept_language Use for knowing which language to use (optional, default to 'es')
     * @param  string $x_child_company_id In the case of a holding company, the company id of the child company to which will process the request. (optional)
     * @param  int $limit The numbers of items to return, the maximum value is 250 (optional, default to 20)
     * @param  string $search General order search, e.g. by mail, reference etc. (optional)
     * @param  string $next next page (optional)
     * @param  string $previous previous page (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getTransactions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getTransactionsRequest($accept_language = 'es', $x_child_company_id = null, $limit = 20, $search = null, $next = null, $previous = null, string $contentType = self::contentTypes['getTransactions'][0])
    {



        if ($limit !== null && $limit > 250) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling TransactionsApi.getTransactions, must be smaller than or equal to 250.');
        }
        if ($limit !== null && $limit < 1) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling TransactionsApi.getTransactions, must be bigger than or equal to 1.');
        }
        




        $resourcePath = '/transactions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $search,
            'search', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $next,
            'next', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $previous,
            'previous', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);

        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = ObjectSerializer::toHeaderValue($accept_language);
        }
        // header params
        if ($x_child_company_id !== null) {
            $headerParams['X-Child-Company-Id'] = ObjectSerializer::toHeaderValue($x_child_company_id);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/vnd.conekta-v2.1.0+json', ],
            $contentType,
            $multipart
        );
        $headers = array_merge(
            $this->headerSelector->getConektaUserAgent(),
            $headers
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }
        $options[RequestOptions::SSL_KEY] = __DIR__ . '/../ssl_data/ca_bundle.crt';

        return $options;
    }
}
