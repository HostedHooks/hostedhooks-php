<?php

namespace HostedHooks\Resources;

use HostedHooks\HostedHooksClient;

class Endpoint
{
    public function __construct(private HostedHooksClient $hostedHooks)
    {}

    public function list(string $appId): array
    {
        return $this->hostedHooks->get("apps/$appId/endpoints");
    }

    public function show(string $appId, string $endpointId): array
    {
        return $this->hostedHooks->get("apps/$appId/endpoints/$endpointId");
    }

    public function store(string $subscriptionId, array $payload): array
    {
        return $this->hostedHooks->post("subscriptions/$subscriptionId/endpoints", $payload);
    }

    public function update(string $subscriptionId, string $endpointId, array $payload): array
    {
        return $this->hostedHooks->patch("subscriptions/$subscriptionId/endpoints/$endpointId", $payload);
    }
}