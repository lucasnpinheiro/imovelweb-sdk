<?php
namespace MrPrompt\ImovelWeb\Tests\Base;

use Faker\Generator;
use Faker\Factory;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

abstract class Base extends TestCase
{
    protected ClientInterface $client;
    protected Generator $faker;
    protected object $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();
    }

    public function getClient(array $handlerStack = []): Client
    {
        $mock = new MockHandler($handlerStack);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        $client->baseUrl = '';

        return $client;
    }
}
