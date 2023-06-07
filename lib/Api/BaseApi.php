<?php

namespace Conekta\Api;

use Conekta\ApiException;
use Conekta\Configuration;
use Conekta\HeaderSelector;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use RuntimeException;

class BaseApi
{
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
        $options[RequestOptions::CERT] = __DIR__ . '/../ssl_data/ca_bundle.cer';

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
}
