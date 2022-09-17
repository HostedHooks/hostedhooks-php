<?php

namespace HostedHooks\Tests\Resources;

use HostedHooks\Resources\Endpoint;
use HostedHooks\Tests\TestCase;

class EndpointTest extends TestCase
{
    /** @test */
    public function it_lists_endpoints_for_an_app(): void
    {
        $response = $this->expectedResponse();

        $hostedHooksClient = $this->buildClient($response);

        $endpoint = new Endpoint($hostedHooksClient);

        $this->assertSame($response, $endpoint->list('bd8ba9a4-05a3-4592-838c-4f98bc92e84f'));
    }

    /** @test */
    public function it_shows_detail_of_an_endpoint(): void
    {
        $response = $this->expectedResponse();

        $hostedHooksClient = $this->buildClient($response);

        $endpoint = new Endpoint($hostedHooksClient);

        $this->assertSame($response, $endpoint->show(
            'bd8ba9a4-05a3-4592-838c-4f98bc92e84f',
            '4fc8e1f4-2d49-46ee-99a2-c8b942dd4c59'
        ));
    }

    /** @test */
    public function it_creates_new_endpoint_for_a_subscription(): void
    {
        $response = $this->expectedResponse();

        $hostedHooksClient = $this->buildClient($response);

        $endpoint = new Endpoint($hostedHooksClient);

        $this->assertSame($response, $endpoint->store(
            'c17f9d4f-52cd-4819-a0b3-e7b5ad68b761', [
                'url' => 'https://wwww.companyabc.com/webhooks',
                'version' => '1.0',
                'status' => 'active',
                'description' => 'Endpoint description'
            ]
        ));
    }

    private function expectedResponse(): array
    {
        return [
            [
                "id" => "4fc8e1f4-2d49-46ee-99a2-c8b942dd4c59",
                "url" => "https://wwww.companyabc.com/webhooks",
                "description" => "Endpoint description",
                "version" => "1.0",
                "status" => "active",
                "error_rate" => 50.0,
                "created_at" => "2021-03-29T20:57:19.128-04:00",
                "webhook_events" => [
                    [
                        "id" => "1a8833ae-7d02-4855-b7fa-53d4aa7ef7f7",
                        "event_type" => "user.created",
                        "created_at" => "2021-03-27T10:07:17.608-04:00",
                    ],
                ],
                "subscription" => [
                    "id" => "c17f9d4f-52cd-4819-a0b3-e7b5ad68b761",
                    "subscriber_name" => "New Subscriber Company",
                    "created_at" => "2021-03-29T10:03:09.717-04:00",
                ],
            ],
        ];
    }
}