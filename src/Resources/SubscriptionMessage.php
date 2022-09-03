<?php

namespace HostedHooks\Resources;

use HostedHooks\HostedHooksClient;

class SubscriptionMessage
{
    public function __construct(public HostedHooksClient $hostedHooks)
    {}

    public function store(string $subscriptionId, array $payload): array
    {
        return $this->hostedHooks->post("subscriptions/$subscriptionId/messages", $payload);
    }
}