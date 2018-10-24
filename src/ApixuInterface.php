<?php declare(strict_types = 1);

namespace Apixu;

use Apixu\Exception\ApixuException;
use Apixu\Response\Conditions;
use Apixu\Response\CurrentWeather;
use Apixu\Response\Forecast\Forecast;
use Apixu\Response\History;
use Apixu\Response\Search;

interface ApixuInterface
{
    const HISTORY_SINCE_FORMAT = 'Y-m-d';

    /**
     * List of weather conditions
     *
     * @return Conditions
     * @throws ApixuException
     */
    public function conditions() : Conditions;

    /**
     * Realtime weather information by city name
     *
     * @param string $query
     * @return CurrentWeather
     * @throws ApixuException
     */
    public function current(string $query) : CurrentWeather;

    /**
     * Finds cities and towns matching your query (autocomplete)
     *
     * @param string $query
     * @return Search
     * @throws ApixuException
     */
    public function search(string $query) : Search;

    /**
     * Weather forecast for up to next 10 days
     *
     * @param string $query
     * @param int $days
     * @return Forecast
     * @throws ApixuException
     */
    public function forecast(string $query, int $days) : Forecast;

    /**
     * Historical weather information for a city and a date starting 2015-01-01
     *
     * @param string $query
     * @param \DateTime $since
     * @return History
     * @throws ApixuException
     */
    public function history(string $query, \DateTime $since) : History;
}
