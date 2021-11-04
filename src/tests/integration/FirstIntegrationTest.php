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

    public function test3(): void
    {

        //$result = file_get_contents('http://localhost:8001/entries');
        //echo "/foo returns " . $result;

        $publicApi = new PublicApi();
        $result = $publicApi->getEntries('http://localhost:8001');
        //$result = $publicApi->getEntries('https://api.publicapis.org');

        $this->assertEquals($result, json_encode(['foo' => 'bar']));

    }

    public function tearDown(): void
    {
        $this->server->stop();
    }
}