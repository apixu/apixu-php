<?php declare(strict_types = 1);

namespace Apixu\Tests;

use Apixu\Api\ApiInterface;
use Apixu\Apixu;
use Apixu\ApixuInterface;
use Apixu\Config;
use Apixu\Exception\ApixuException;
use Apixu\Exception\InvalidQueryException;
use Apixu\Response\Condition;
use Apixu\Response\Conditions;
use Apixu\Response\CurrentWeather;
use Apixu\Response\Forecast\Forecast;
use Apixu\Response\History;
use Apixu\Response\Search;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Serializer\SerializerInterface;
use Serializer\ToArray\ToArrayInterface;

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

    public function testConditions()
    {
        $responseString = '[{},{}]';
        $expectedObject = new Conditions([new Condition(), new Condition()]);

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
            $this->assertInstanceOf(InvalidQueryException::class, $e);
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
            $this->assertInstanceOf(InvalidQueryException::class, $e);
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

    public function testForecast()
    {
        $responseString = '{}';
        $expectedObject = new Forecast();

        $response = $this->createMock(StreamInterface::class);
        $response->expects($this->once())
            ->method('getContents')
            ->willReturn($responseString);

        $this->api
            ->expects($this->once())
            ->method('call')
            ->with('forecast', ['q' => 'query', 'days' => 1,])
            ->willReturn($response);

        $this->serializer->expects($this->once())
            ->method('unserialize')
            ->with($responseString, Forecast::class)
            ->willReturn($expectedObject);

        /** @var Forecast $forecast */
        $forecast = $this->apixu->forecast('query', 1);
        $this->assertEquals($expectedObject, $forecast);
        $this->assertInstanceOf(ToArrayInterface::class, $forecast);
    }

    public function testHistory()
    {
        $responseString = '{}';
        $expectedObject = new History();

        $response = $this->createMock(StreamInterface::class);
        $response->expects($this->once())
            ->method('getContents')
            ->willReturn($responseString);

        $query = 'query';
        $since = new \DateTime();

        $this->api
            ->expects($this->once())
            ->method('call')
            ->with('history', ['q' => $query, 'dt' => $since->format(Apixu::HISTORY_SINCE_FORMAT),])
            ->willReturn($response);

        $this->serializer->expects($this->once())
            ->method('unserialize')
            ->with($responseString, History::class)
            ->willReturn($expectedObject);

        /** @var History $forecast */
        $forecast = $this->apixu->history($query, $since);
        $this->assertEquals($expectedObject, $forecast);
        $this->assertInstanceOf(ToArrayInterface::class, $forecast);
    }
}
