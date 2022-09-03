<?php

namespace HostedHooks\Resources;

use HostedHooks\HostedHooksClient;

class Subscription
{
    public function __construct(private HostedHooksClient $hostedHooks)
    {}

    public function list(string $appId): array
    {
        return $this->hostedHooks->get("apps/$appId/subscriptions");
    }

    public function show(string $subscriptionId): array
    {
        return $this->hostedHooks->get("subscriptions/$subscriptionId");
    }

    public function store(string $appId, array $payload): array
    {
        return $this->hostedHooks->post("apps/$appId/subscriptions", $payload);
    }
}