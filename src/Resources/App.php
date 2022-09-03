<?php

namespace HostedHooks\Resources;

use GuzzleHttp\Exception\GuzzleException;
use HostedHooks\HostedHooksClient;

class App
{
    public function __construct(public HostedHooksClient $hostedHooks)
    {}

    /**
     * @throws GuzzleException
     */
    public function list(): array
    {
        return $this->hostedHooks->get('apps');
    }

    /**
     * @throws GuzzleException
     */
    public function store(array $payload): array
    {
        return $this->hostedHooks->post('apps', $payload);
    }

    /**
     * @throws GuzzleException
     */
    public function update(string $appId, array $payload): array
    {
        return $this->hostedHooks->patch("apps/$appId", $payload);
    }
}