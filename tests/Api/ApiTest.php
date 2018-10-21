<?php declare(strict_types = 1);

namespace Apixu\Tests\Api;

use Apixu\Api\Api;
use Apixu\Api\ApiInterface;
use Apixu\Api\StatusCodes;
use Apixu\Config;
use Apixu\Exception\ApixuException;
use Apixu\Exception\ErrorException;
use Apixu\Exception\InternalServerErrorException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ApiTest extends TestCase
{
    /**
     * @var ApiInterface
     */
    private $api;

    private $apiKey = 'apikey';
    private $httpClient;

    protected function setUp()
    {
        $this->httpClient = $this->createMock(ClientInterface::class);
        $this->api = new Api($this->apiKey, $this->httpClient);
    }

    public function testCallWithMethod()
    {
        $body = $this->createMock(StreamInterface::class);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->once())
            ->method('getBody')
            ->willReturn($body);
        $response->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(StatusCodes::OK);

        $method = 'method';
        $query = 'query';
        $url = sprintf(
            Config::API_URL,
            Config::API_VERSION,
            $method,
            Config::FORMAT,
            $this->apiKey,
            '&q=' . $query
        );

        $this->httpClient
            ->expects($this->once())
            ->method('request')
            ->with('GET', $url)
            ->willReturn($response);

        $result = $this->api->call($method, ['q' => $query]);
        $this->assertInstanceOf(StreamInterface::class, $result);
    }

    public function testCallWithUrl()
    {
        $body = $this->createMock(StreamInterface::class);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->once())
            ->method('getBody')
            ->willReturn($body);
        $response->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(StatusCodes::OK);

        $url = 'https://url';
        $this->httpClient
            ->expects($this->once())
            ->method('request')
            ->with('GET', $url)
            ->willReturn($response);

        $result = $this->api->call($url);
        $this->assertInstanceOf(StreamInterface::class, $result);
    }

    public function testCallWithInternalServerError()
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(StatusCodes::INTERNAL_SERVER_ERROR);

        $url = 'https://url';
        $this->httpClient
            ->expects($this->once())
            ->method('request')
            ->with('GET', $url)
            ->willReturn($response);

        try {
            $this->api->call($url);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(InternalServerErrorException::class, $e);
        }
    }

    public function testCallWithGeneralError()
    {
        $responseString = '{"message": "bad request", "code": 123}';

        $body = $this->createMock(StreamInterface::class);
        $body->expects($this->once())
            ->method('getContents')
            ->willReturn($responseString);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->once())
            ->method('getBody')
            ->willReturn($body);
        $response->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(StatusCodes::BAD_REQUEST);

        $url = 'https://url';
        $this->httpClient
            ->expects($this->once())
            ->method('request')
            ->with('GET', $url)
            ->willReturn($response);

        try {
            $this->api->call($url);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(ErrorException::class, $e);
            $this->assertSame('bad request', $e->getMessage());
            $this->assertSame(123, $e->getCode());
        }
    }

    public function testCallWithHttpClientException()
    {
        $exception = new BadResponseException('message', new Request('', ''));
        $url = 'https://url';
        $this->httpClient
            ->expects($this->once())
            ->method('request')
            ->with('GET', $url)
            ->will($this->throwException($exception));

        try {
            $this->api->call($url);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
        }
    }
}