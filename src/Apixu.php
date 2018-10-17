<?php declare(strict_types = 1);

namespace Apixu;

use Apixu\Api\ApiInterface;
use Apixu\Exception\InvalidQueryException;
use Apixu\Response\Conditions;
use Apixu\Response\CurrentWeather;
use Apixu\Response\Forecast\Forecast;
use Apixu\Response\History;
use Apixu\Response\Search;
use Psr\Http\Message\StreamInterface;
use Serializer\SerializerInterface;

class Apixu implements ApixuInterface
{
    /**
     * @var ApiInterface
     */
    private $api;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param ApiInterface $api
     * @param SerializerInterface $serializer
     */
    public function __construct(ApiInterface $api, SerializerInterface $serializer)
    {
        $this->api = $api;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function conditions() : Conditions
    {
        $url = sprintf(Config::DOC_WEATHER_CONDITIONS_URL, Config::FORMAT);
        $response = $this->api->call($url);

        return $this->getResponse($response, Conditions::class);
    }

    /**
     * {@inheritdoc}
     */
    public function current(string $query) : CurrentWeather
    {
        $this->validateQuery($query);
        $response = $this->api->call('current', ['q' => $query]);

        return $this->getResponse($response, CurrentWeather::class);
    }

    /**
     * {@inheritdoc}
     */
    public function search(string $query) : Search
    {
        $this->validateQuery($query);
        $response = $this->api->call('search', ['q' => $query]);

        return $this->getResponse($response, Search::class);
    }

    /**
     * {@inheritdoc}
     */
    public function forecast(string $query, int $days) : Forecast
    {
        $this->validateQuery($query);
        $response = $this->api->call('forecast', ['q' => $query, 'days' => $days]);

        return $this->getResponse($response, Forecast::class);
    }

    /**
     * {@inheritdoc}
     */
    public function history(string $query, \DateTime $since) : History
    {
        $this->validateQuery($query);
        $response = $this->api->call('history', ['q' => $query, 'dt' => $since->format(self::HISTORY_SINCE_FORMAT)]);

        return $this->getResponse($response, History::class);
    }

    /**
     * @param string $query
     * @throws InvalidQueryException
     */
    private function validateQuery(string $query)
    {
        $query = trim($query);

        if ($query === '') {
            throw new InvalidQueryException('Query is missing');
        }

        if (strlen($query) > Config::MAX_QUERY_LENGTH) {
            throw new InvalidQueryException(
                sprintf('Query exceeds maximum length (%d)', Config::MAX_QUERY_LENGTH)
            );
        }
    }

    /**
     * @param StreamInterface $response
     * @param string $class
     * @return mixed
     */
    private function getResponse(StreamInterface $response, string $class)
    {
        return $this->serializer->unserialize($response->getContents(), $class);
    }
}
