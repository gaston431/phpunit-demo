<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class UserAgentTest extends TestCase
{
    private $http;
    public function setUp(): void
    {
        $this->http = new Client(['base_uri' => 'https://httpbin.org/']);
    }
    public function tearDown(): void
    {
        $this->http = null;
    }

    public function testGet(): void
    {
        $response = $this->http->request('GET', 'user-agent');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals("application/json", $contentType);

        $content = $response->getBody()->getContents();

        $userAgent = json_decode($content)->{"user-agent"};

        $this->assertMatchesRegularExpression('/Guzzle/', $userAgent);
    }

    public function testPut()
    {
        $response = $this->http->request('PUT', 'user-agent', ['http_errors' => false]);
        
        $this->assertEquals(405, $response->getStatusCode());
    }
}
