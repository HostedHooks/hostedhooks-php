<?php

namespace HostedHooks;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class HostedHooksClient
{
    public const API_ENDPOINT = 'https://www.hostedhooks.com/api/v1/';

    public string $apiKey;

    public Client $client;

    public function __construct(string $apiKey, Client $client = null)
    {
        $this->apiKey = $apiKey;

        $this->client = $client ?: new Client([
            'base_uri' => self::API_ENDPOINT,
            'timeout' => 3,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey
            ]
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $uri): array
    {
        $response = $this->client->get($uri);

        return $this->handleResponse($response);
    }

    /**
     * @throws GuzzleException
     */
    public function post(string $uri, array $payload): array
    {
        $response = $this->client->post($uri, [
           'json' => $payload
        ]);

        return $this->handleResponse($response);
    }

    /**
     * @throws GuzzleException
     */
    public function patch(string $uri, array $payload): array
    {
        $response = $this->client->patch($uri, [
            'json' => $payload
        ]);

        return $this->handleResponse($response);
    }

    private function handleResponse(ResponseInterface $response): array
    {
        $body = json_decode($response->getBody()->getContents(),true);

        if ($response->getStatusCode() >= 400) {
            return [
                'error' => $body['message'],
                'status' => $response->getStatusCode()
            ];
        }

        return $body;
    }
}