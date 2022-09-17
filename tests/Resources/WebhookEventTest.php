<?php

namespace HostedHooks\Tests\Resources;

use HostedHooks\Resources\WebhookEvent;
use HostedHooks\Tests\TestCase;

class WebhookEventTest extends TestCase
{
    /** @test */
    public function it_gets_all_webhook_events_for_an_app(): void
    {
        $response = $this->expectedResponse();

        $hostedHooksClient = $this->buildClient($response);

        $webhookEvent = new WebhookEvent($hostedHooksClient);

        $this->assertSame($response, $webhookEvent->list('bd8ba9a4-05a3-4592-838c-4f98bc92e84f'));
    }

    private function expectedResponse(): array
    {
        return [
            [
                "id" => "9fe10e24-455a-4089-b62d-539d46fa9302",
                "event_type" => "user.created",
                "created_at" => "2021-03-23T08:19:38.943-04:00",
                "app" => [
                    "id" => "bd8ba9a4-05a3-4592-838c-4f98bc92e84f",
                    "name" => "Super Cool SaaS",
                    "created_at" => "2021-03-27T10:07:17.540-04:00",
                ],
            ],
            [
                "id" => "0f6f3219-1c40-4a1f-bf2e-35e00b210c9f",
                "event_type" => "order.confirmed",
                "created_at" => "2021-03-23T08:19:38.943-04:00",
                "app" => [
                    "id" => "bd8ba9a4-05a3-4592-838c-4f98bc92e84f",
                    "name" => "Super Cool SaaS",
                    "created_at" => "2021-03-27T10:07:17.540-04:00",
                ],
            ],
        ];
    }
}