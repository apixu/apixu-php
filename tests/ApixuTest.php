<?php declare(strict_types = 1);

namespace Apixu\Tests;

use Apixu\Api\ApiInterface;
use Apixu\Apixu;
use Apixu\ApixuInterface;
use Apixu\Config;
use Apixu\Exception\ApixuException;
use Apixu\Exception\InvalidArgumentException;
use Apixu\Response\Condition;
use Apixu\Response\Conditions;
use Apixu\Response\CurrentWeather;
use Apixu\Response\Search;
use Apixu\Response\ToArrayInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Serializer\SerializerInterface;

class ApixuTest extends TestCase
{
    /**
     * @var ApixuInterface
     */
    private $apixu;

    private $api;
    private $serializer;

    protected function setUp()
    {
        $this->api = $this->createMock(ApiInterface::class);
        $this->serializer = $this->createMock(SerializerInterface::class);
        $this->apixu = new Apixu($this->api, $this->serializer);
    }

    /**
     * @dataProvider conditionsTestData
     * @param string $responseString
     * @param Conditions $expectedObject
     * @param array $expectedArray
     */
    public function testConditions(string $responseString, Conditions $expectedObject, array $expectedArray)
    {
        $response = $this->createMock(StreamInterface::class);
        $response->expects($this->once())
            ->method('getContents')
            ->willReturn($responseString);

        $url = sprintf(Config::DOC_WEATHER_CONDITIONS_URL, Config::FORMAT);
        $this->api
            ->expects($this->once())
            ->method('call')
            ->with($url)
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
        $this->assertInstanceOf(ToArrayInterface::class, $conditions);
    }

    public function testCurrent()
    {
        $responseString = '[]';
        $expectedObject = new CurrentWeather();

        $response = $this->createMock(StreamInterface::class);
        $response->expects($this->once())
            ->method('getContents')
            ->willReturn($responseString);

        $this->api
            ->expects($this->once())
            ->method('call')
            ->with('current', ['q' => 'query'])
            ->willReturn($response);

        $this->serializer->expects($this->once())
            ->method('unserialize')
            ->with($responseString, CurrentWeather::class)
            ->willReturn($expectedObject);

        /** @var CurrentWeather $current */
        $current = $this->apixu->current('query');
        $this->assertEquals($expectedObject, $current);
        $this->assertInstanceOf(ToArrayInterface::class, $current);
    }

    public function testCurrentWithMissingQuery()
    {
        try {
            $query = ' ';
            $this->apixu->current($query);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(InvalidArgumentException::class, $e);
        }
    }

    public function testCurrentWithQueryTooLong()
    {
        try {
            $query = str_repeat('q', Config::MAX_QUERY_LENGTH + 1);
            $this->apixu->current($query);
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(InvalidArgumentException::class, $e);
        }
    }

    public function testSearch()
    {
        $responseString = '[{}]';
        $expectedObject = new Search([]);

        $response = $this->createMock(StreamInterface::class);
        $response->expects($this->once())
            ->method('getContents')
            ->willReturn($responseString);

        $this->api
            ->expects($this->once())
            ->method('call')
            ->with('search', ['q' => 'query'])
            ->willReturn($response);

        $this->serializer->expects($this->once())
            ->method('unserialize')
            ->with($responseString, Search::class)
            ->willReturn($expectedObject);

        /** @var Search $search */
        $search = $this->apixu->search('query');
        $this->assertEquals($expectedObject, $search);
        $this->assertInstanceOf(ToArrayInterface::class, $search);
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
