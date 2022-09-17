<?php

namespace HostedHooks\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use HostedHooks\HostedHooksClient;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function buildClient(array $expectedResponse): HostedHooksClient
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode($expectedResponse, JSON_PRESERVE_ZERO_FRACTION))
        ]);

        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);

        return new HostedHooksClient('random-api-key', $client);
    }
}