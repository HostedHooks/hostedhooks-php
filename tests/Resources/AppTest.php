<?php

namespace HostedHooks\Tests\Resources;

use HostedHooks\Resources\App;
use HostedHooks\Tests\TestCase;

class AppTest extends TestCase
{
    /** @test */
    public function it_lists_the_apps(): void
    {
        $response = [
            [
                'id' => 'eb3f2589-69a9-4dd7-832e-b754d0ce8808',
                'name' => 'ABC app',
                'created_at' => '2021-05-29T09:35:23.087-04:00'
            ]
        ];

        $hostedHooksClient = $this->buildClient($response);

        $app = new App($hostedHooksClient);

        $this->assertSame($response, $app->list());
    }

    /** @test */
    public function it_creates_the_app(): void
    {
        $response = [
            'id' => 'eb3f2589-69a9-4dd7-832e-b754d0ce8808',
            'name' => 'ABC app',
            'created_at' => '2021-05-29T09:35:23.087-04:00'
        ];

        $hostedHooksClient = $this->buildClient($response);

        $app = new App($hostedHooksClient);

        $payload = [
            'name' => "ABC app"
        ];

        $this->assertSame($response, $app->store($payload));
    }
    
    /** @test */
    public function it_can_update_the_app(): void
    {
        $response = [
            'id' => 'eb3f2589-69a9-4dd7-832e-b754d0ce8808',
            'name' => 'XYZ app',
            'created_at' => '2021-05-29T09:35:23.087-04:00'
        ];

        $hostedHooksClient = $this->buildClient($response);

        $app = new App($hostedHooksClient);

        $payload = [
            'name' => "XYZ app"
        ];

        $this->assertSame($response, $app->store($payload));
    }
}