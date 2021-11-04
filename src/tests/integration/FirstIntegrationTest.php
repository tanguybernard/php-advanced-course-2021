<?php

use Course\App\PublicApi;
use PHPUnit\Framework\TestCase;
use donatj\MockWebServer\MockWebServer;
use donatj\MockWebServer\Response;

final class FirstIntegrationTest extends TestCase
{
    public function test3(): void
    {

        // https://api.publicapis.org/entries
        $server = new MockWebServer(8001);
        $server->start();
        $server->setResponseOfPath('/entries', new Response(json_encode(['foo' => 'bar'])));

        //$result = file_get_contents('http://localhost:8001/entries');
        //echo "/foo returns " . $result;

        $publicApi = new PublicApi();
        $result = $publicApi->getEntries('http://localhost:8001');
        //$result = $publicApi->getEntries('https://api.publicapis.org');


        $this->assertEquals($result, json_encode(['foo' => 'bar']));

    }
}