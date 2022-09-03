<?php

namespace HostedHooks\Resources;

use HostedHooks\HostedHooksClient;

class AppMessage
{
    public function __construct(public HostedHooksClient $hostedHooks)
    {}

    public function store(string $appId, array $payload): array
    {
        return $this->hostedHooks->post("apps/$appId/messages", $payload);
    }
}