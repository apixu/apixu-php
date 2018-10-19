<?php

namespace Apixu\Response\Forecast;

use Apixu\Response\Current;
use Apixu\Response\Location;

class Forecast
{
    /**
     * @var Location
     *
     * @Serializer\Property("location")
     * @Serializer\Type("Apixu\Response\Location")
     */
    private $location;

    /**
     * @var Current
     *
     * @Serializer\Property("current")
     * @Serializer\Type("Apixu\Response\Current")
     */
    private $current;

    /**
     * @var ForecastWeather
     *
     * @Serializer\Property("forecast")
     * @Serializer\Type("Apixu\Response\Forecast\ForecastWeather")
     */
    private $forecast;

    /**
     * @return Location
     */
    public function getLocation() : Location
    {
        return $this->location;
    }

    /**
     * @return Current
     */
    public function getCurrent() : Current
    {
        return $this->current;
    }

    /**
     * @return ForecastWeather
     */
    public function getForecast() : ForecastWeather
    {
        return $this->forecast;
    }
}
