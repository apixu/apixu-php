<?php declare(strict_types = 1);

namespace Apixu\Response;

use Apixu\Response\Forecast\ForecastWeather;

class History
{
    /**
     * @var Location
     *
     * @Serializer\Property("location")
     * @Serializer\Type("Apixu\Response\Location")
     */
    private $location;

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
     * @return ForecastWeather
     */
    public function getForecast() : ForecastWeather
    {
        return $this->forecast;
    }
}
