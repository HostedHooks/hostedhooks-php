<?php

namespace HostedHooks\Resources;

use HostedHooks\HostedHooksClient;

class WebhookEvent
{
    public function __construct(public HostedHooksClient $hostedHooks)
    {}

    public function list(string $appId): array
    {
        return $this->hostedHooks->get("apps/$appId/webhook_events");
    }
}