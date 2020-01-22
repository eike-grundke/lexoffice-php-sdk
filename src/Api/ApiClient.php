<?php declare (strict_types = 1);

namespace LexofficeSdk\Api;

use GuzzleHttp\Client;

class ApiClient implements ApiClientInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $endpoint;

    /**
     * @param string $apiKey
     * @param string $endpoint
     */
    public function __construct(
        string $apiKey,
        string $endpoint = 'https://api.lexoffice.io/v1/'
    ) {
        $this->client = new Client();
        $this->endpoint = $endpoint;
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $uri
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(string $uri): \Psr\Http\Message\ResponseInterface
    {
        $options = $this->getDefaultOptions();
        return $this->client->get($this->endpoint . $uri, $options);
    }

    /**
     * @param string $uri
     * @param string $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post(string $uri, string $body): \Psr\Http\Message\ResponseInterface
    {
        $options = $this->getDefaultOptions();
        $options['body'] = $body;
        return $this->client->post($this->endpoint . $uri, $options);
    }

    /**
     * @param string $uri
     * @param string $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function put(string $uri, string $body): \Psr\Http\Message\ResponseInterface
    {
        $options = $this->getDefaultOptions();
        $options['body'] = $body;
        return $this->client->put($this->endpoint . $uri, $options);
    }

    /**
     * @param string $uri
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(string $uri): \Psr\Http\Message\ResponseInterface
    {
        $options = $this->getDefaultOptions();
        return $this->client->delete($this->endpoint . $uri, $options);
    }

    /**
     * @return array
     */
    private function getDefaultOptions(): array
    {
        return [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'body' => '',
        ];
    }
}
