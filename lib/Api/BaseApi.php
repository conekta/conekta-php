<?php

namespace Conekta\Api;

use Conekta\ApiException;
use Conekta\Configuration;
use Conekta\HeaderSelector;
use Conekta\ObjectSerializer;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

class BaseApi
{

    /** @var string $apiVersion * */
    public const apiVersion = '2.1.0';

    /** @var string $aplicationJson * */
    public const applicationJson = 'application/json';

    /** @var string $vndConektaJsonHeader * */
    public const vndConektaJsonHeader = 'application/vnd.conekta-v' . self::apiVersion . '+json';

    /** @var string[] $contentTypes * */
    public const contentTypes = [
        'default' => [self::applicationJson,]
    ];

    /** @var string $methodPost * */
    public const methodPost = 'POST';

    /** @var string $methodGet * */
    public const methodGet = 'GET';

    /** @var string $methodPut * */
    public const methodPut = 'PUT';

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var HeaderSelector
     */
    protected HeaderSelector $headerSelector;

    /**
     * @var int Host index
     */
    protected int $hostIndex;

    /**
     * @var Configuration
     */
    protected Configuration $config;

    /**
     * @param ClientInterface|null $client
     * @param Configuration|null $config
     * @param HeaderSelector|null $selector
     * @param int $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration   $config = null,
        HeaderSelector  $selector = null,
        int             $hostIndex = 0
    )
    {
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
    public function setHostIndex(int $hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex(): int
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Create http client option
     *
     * @return array of http client options
     * @throws RuntimeException on file opening failure
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }
        $options[RequestOptions::SSL_KEY] = __DIR__ . '/../SslData/ca_bundle.cer';

        return $options;
    }

    /**
     * @param Exception $e
     * @return ApiException
     */
    protected function buildException(Exception $e): ApiException
    {
        return new ApiException(
            "[{$e->getCode()}] {$e->getMessage()}",
            (int)$e->getCode(),
            method_exists($e, 'getResponse') && $e->getResponse() ? $e->getResponse()->getHeaders() : null,
            method_exists($e, 'getResponse') && $e->getResponse() ? (string)$e->getResponse()->getBody() : null
        );
    }

    /**
     * @param string $format
     * @param Request $request
     * @param ResponseInterface $response
     * @return ApiException
     */
    protected function getResponseApiException(string $format, Request $request, ResponseInterface $response): ApiException {
        return new ApiException(
            sprintf($format, $response->getStatusCode(), (string)$request->getUri()),
            $response->getStatusCode(),
            $response->getHeaders(),
            (string)$response->getBody()
        );
    }

    /**
     * @param $content
     * @param string $deserializeClass
     * @param ResponseInterface $response
     * @param array $httpHeaders
     * @return array
     */
    protected function getArrayResponse(
        $content,
        string $deserializeClass,
        ResponseInterface $response,
        array $httpHeaders = []
    ): array {
        return [
            ObjectSerializer::deserialize($content, $deserializeClass, $httpHeaders),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    /**
     * @param $contentType
     * @param $acceptLanguage
     * @param $xChildCompanyID
     * @param $multipart
     * @return array
     */
    protected function buildHeaders($contentType, $acceptLanguage, $xChildCompanyID, $multipart = false): array
    {
        $headers = $this->headerSelector->selectHeaders(
            [self::vndConektaJsonHeader,],
            $contentType,
            $multipart
        );

        if ($acceptLanguage !== null) {
            $headers['Accept-Language'] = ObjectSerializer::toHeaderValue($acceptLanguage);
        }

        if ($xChildCompanyID !== null) {
            $headers['X-Child-Company-Id'] = ObjectSerializer::toHeaderValue($xChildCompanyID);
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        if ($this->config->getUserAgent()) {
            $headers['User-Agent'] = $this->config->getUserAgent();
        }

        return array_merge(
            $this->headerSelector->getConektaUserAgent(),
            $headers
        );
    }

    /**
     * @param Request $request
     * @return ResponseInterface
     * @throws ApiException
     */
    public function getResponse(Request $request): ResponseInterface
    {
        try {
            $options = $this->createHttpClientOption();
            return $this->client->send($request, $options);
        } catch (RequestException|ConnectException|GuzzleException $e) {
            throw $this->buildException($e);
        }
    }

    /**
     * @param string $resourcePath
     * @param string $query
     * @return string
     */
    protected function getUri(string $resourcePath, string $query = ''):string
    {
        return sprintf('%s%s%s', $this->config->getHost(), $resourcePath, ($query ? "?{$query}" : ''));
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $headers
     * @param string $httpBody
     * @return Request
     */
    protected function getRequest(string $method, string $uri, array $headers, string $httpBody = ''): Request{
        return new Request($method, $uri, $headers, $httpBody);
    }

    /**
     * @param ResponseInterface $response
     * @param string $class
     * @return mixed|StreamInterface|string
     */
    protected function getContent(ResponseInterface $response, string $class) {
        if ($class === '\SplFileObject') {
            return $response->getBody();
        }

        $content = (string)$response->getBody();
        if ($class !== 'string') {
            $content = json_decode($content);
        }

        return $content;
    }
}
