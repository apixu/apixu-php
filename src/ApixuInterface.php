<?php

namespace Apixu;

use Apixu\Exception\ApixuException;
use Apixu\Response\Conditions;
use Apixu\Response\CurrentWeather;
use Apixu\Response\Search;

interface ApixuInterface
{
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
}
