<?php

namespace Apixu;

use Apixu\Exception\ApixuException;
use Apixu\Response\Conditions;
use Apixu\Response\CurrentWeather;

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
}
