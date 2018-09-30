<?php declare(strict_types = 1);

namespace Apixu\Tests;

use Apixu\Apixu;
use Apixu\ApixuInterface;
use Apixu\Config;
use Apixu\Exception\ApixuException;
use Apixu\Exception\InternalServerErrorException;
use Apixu\Response\Condition;
use Apixu\Response\Conditions;
use Apixu\StatusCodes;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Serializer\SerializerInterface;

class ApixuTest extends TestCase
{
    /**
     * @var ApixuInterface
     */
    private $apixu;

    private $httpClient;
    private $serializer;

    protected function setUp()
    {
        $this->httpClient = $this->createMock(ClientInterface::class);
        $this->serializer = $this->createMock(SerializerInterface::class);
        $this->apixu = new Apixu('apikey', $this->httpClient, $this->serializer);
    }

    /**
     * @dataProvider conditionsTestData
     * @param string $responseString
     * @param Conditions $expectedObject
     * @param array $expectedArray
     */
    public function testConditions(string $responseString, Conditions $expectedObject, array $expectedArray)
    {
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
            ->willReturn(StatusCodes::OK);

        $url = sprintf(Config::DOC_WEATHER_CONDITIONS_URL, Config::FORMAT);
        $this->httpClient
            ->expects($this->once())
            ->method('request')
            ->with('GET', $url)
            ->willReturn($response);

        $this->serializer->expects($this->once())
            ->method('unserialize')
            ->with($responseString, Conditions::class)
            ->willReturn($expectedObject);

        /** @var Conditions $conditions */
        $conditions = $this->apixu->conditions();
        $this->assertCount(2, $conditions);
        $this->assertContainsOnlyInstancesOf(Condition::class, $conditions);
        $this->assertEquals($expectedObject, $conditions);
        $this->assertEquals($expectedArray, $conditions->toArray());
    }

    public function testInternalServerError()
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(StatusCodes::INTERNAL_SERVER_ERROR);
        $url = sprintf(Config::DOC_WEATHER_CONDITIONS_URL, Config::FORMAT);
        $this->httpClient
            ->expects($this->once())
            ->method('request')
            ->with('GET', $url)
            ->willReturn($response);

        try {
            $this->apixu->conditions();
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(InternalServerErrorException::class, $e);
        }
    }

    /**
     * @return array
     */
    public function conditionsTestData() : array
    {
        $responseString = '[
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

        $expectedArray = json_decode($responseString, true);
        $ref = new \ReflectionClass(Condition::class);

        $conditions = [];
        foreach ($expectedArray as $item) {
            $c = new Condition();
            foreach ($item as $k => $v) {
                $p = $ref->getProperty($k);
                $p->setAccessible(true);
                $p->setValue($c, $v);
            }
            $conditions [] = $c;
        }

        $expectedObject = new Conditions($conditions);

        return [
            [
                $responseString,
                $expectedObject,
                $expectedArray,
            ]
        ];
    }
}
