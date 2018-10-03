<?php

namespace Apixu\Response\Forecast;

use Apixu\Response\Current;
use Apixu\Response\Location;
use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class Forecast implements ToArrayInterface
{
    use ToArrayTrait;

    /**
     * @var Location|null
     *
     * @Serializer\Property("location")
     * @Serializer\Type("Apixu\Response\Location")
     */
    private $location;

    /**
     * @var Current|null
     *
     * @Serializer\Property("current")
     * @Serializer\Type("Apixu\Response\Current")
     */
    private $current;

    /**
     * @var ForecastWeather|null
     *
     * @Serializer\Property("forecast")
     * @Serializer\Type("Apixu\Response\Forecast\ForecastWeather")
     */
    private $forecast;

    /**
     * @return Location|null
     */
    public function getLocation() : Location
    {
        return $this->location;
    }

    /**
     * @return Current|null
     */
    public function getCurrent() : Current
    {
        return $this->current;
    }

    /**
     * @return ForecastWeather|null
     */
    public function getForecast() : ForecastWeather
    {
        return $this->forecast;
    }
}
