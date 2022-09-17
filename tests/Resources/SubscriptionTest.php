<?php

namespace HostedHooks\Tests\Resources;

use HostedHooks\Resources\Subscription;
use HostedHooks\Tests\TestCase;

class SubscriptionTest extends TestCase
{
    /** @test */
    public function it_lists_subscriptions_for_an_app(): void
    {
        $response = [
            [
                "id" => "c17f9d4f-52cd-4819-a0b3-e7b5ad68b761",
                "subscriber_name" => "New Subscriber Company",
                "created_at" => "2021-03-29T10:03:09.717-04:00",
                "app" => [
                    "id" => "bd8ba9a4-05a3-4592-838c-4f98bc92e84f",
                    "name" => "Super Cool SaaS",
                    "created_at" => "2021-03-27T10:07:17.540-04:00",
                ],
            ],
        ];

        $hostedHooksClient = $this->buildClient($response);

        $subscription = new Subscription($hostedHooksClient);

        $subscriptions = $subscription->list('bd8ba9a4-05a3-4592-838c-4f98bc92e84f');

        $this->assertSame($response, $subscriptions);
    }

    /** @test */
    public function it_gets_details_of_a_subscription(): void
    {
        $response = [
            "id" => "c17f9d4f-52cd-4819-a0b3-e7b5ad68b761",
            "subscriber_name" => "New Subscriber Company",
            "created_at" => "2021-03-29T10:03:09.717-04:00",
            "app" => [
                "id" => "bd8ba9a4-05a3-4592-838c-4f98bc92e84f",
                "name" => "Super Cool SaaS",
                "created_at" => "2021-03-27T10:07:17.540-04:00",
            ]
        ];

        $hostedHooksClient = $this->buildClient($response);

        $subscription = new Subscription($hostedHooksClient);

        $subscription = $subscription->show('c17f9d4f-52cd-4819-a0b3-e7b5ad68b761');

        $this->assertSame($response, $subscription);
    }

    /** @test */
    public function it_creates_new_subscription_for_an_app(): void
    {
        $response = [
            "id" => "c17f9d4f-52cd-4819-a0b3-e7b5ad68b761",
            "subscriber_name" => "New Subscriber Company",
            "created_at" => "2021-03-29T10:03:09.717-04:00",
            "app" => [
                "id" => "bd8ba9a4-05a3-4592-838c-4f98bc92e84f",
                "name" => "Super Cool SaaS",
                "created_at" => "2021-03-27T10:07:17.540-04:00",
            ]
        ];

        $hostedHooksClient = $this->buildClient($response);

        $subscription = new Subscription($hostedHooksClient);

        $subscription = $subscription->store('bd8ba9a4-05a3-4592-838c-4f98bc92e84f', [
            'name' => 'New Subscriber Company'
        ]);

        $this->assertSame($response, $subscription);
    }
}