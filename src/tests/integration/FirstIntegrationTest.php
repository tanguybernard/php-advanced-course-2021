<?php

use Course\App\PublicApi;
use donatj\MockWebServer\ResponseByMethod;
use PHPUnit\Framework\TestCase;
use donatj\MockWebServer\MockWebServer;
use donatj\MockWebServer\Response;

final class FirstIntegrationTest extends TestCase
{

    public MockWebServer $server;

    public function setUp(): void
    {
        $this->server = new MockWebServer(8001);
        $this->server->start();

        // exemple with multiple methods
        $response = new ResponseByMethod([
            ResponseByMethod::METHOD_GET  => new Response(json_encode(['foo' => 'bar'])),
            ResponseByMethod::METHOD_POST => new Response("This is our http POST response", [], 201),
        ]);

        $this->server->setResponseOfPath('/entries', $response);
    }

    public function testGetEntries(): void
    {
        //Before
        $publicApi = new PublicApi();
        $url = 'http://localhost:8001';

        //When
        $result = $publicApi->getEntries($url);//'https://api.publicapis.org'

        //Then
        $this->assertEquals($result, json_encode(['foo' => 'bar']));

    }

    public function tearDown(): void
    {
        $this->server->stop();
    }
}