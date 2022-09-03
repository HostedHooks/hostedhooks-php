<?php

namespace HostedHooks\Resources;

use HostedHooks\HostedHooksClient;

class EndpointMessage
{
    public function __construct(public HostedHooksClient $hostedHooks)
    {}

    public function store(string $subscriptionId, string $endpointId, array $payload): array
    {
        return $this->hostedHooks->post(
            "subscriptions/$subscriptionId/endpoints/$endpointId/messages",
            $payload
        );
    }
}