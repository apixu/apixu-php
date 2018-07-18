<?php

namespace Apixu\Tests;

use Apixu\Api;
use Apixu\Config;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ApiTest extends TestCase
{
    private $config;
    private $httpClient;

    protected function setUp()
    {
        $this->config = new Config();
        $this->httpClient = $this->createMock(ClientInterface::class);
    }

    public function testConditions()
    {
        $contents = '[
            {
                "code" : 1000,
                "day" : "Sunny",
                "night" : "Clear",
                "icon" : 113
            },
            {
                "code" : 1003,
                "day" : "Partly cloudy",
                "night" : "Partly cloudy",
                "icon" : 116
            }]';

        $body = $this->createMock(StreamInterface::class);
        $body->expects($this->once())
            ->method('getContents')
            ->willReturn($contents);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->once())
            ->method('getBody')
            ->willReturn($body);
        $response->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(200);

        $url = sprintf(Config::DOC_WEATHER_CONDITIONS_URL, Config::FORMAT);
        $this->httpClient
            ->expects($this->once())
            ->method('request')
            ->with('GET', $url)
            ->willReturn($response);
        $api = new Api($this->config, $this->httpClient);

        $conditions = $api->conditions();
        $this->assertSame(json_decode($contents, true), $conditions->toArray());
    }
}
