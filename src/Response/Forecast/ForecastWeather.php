<?php

namespace Apixu\Response\Forecast;

use Serializer\Collection;

class ForecastWeather
{
    /**
     * @var Collection[Apixu\Response\Forecast\ForecastDay]
     *
     * @Serializer\Property("forecastday")
     * @Serializer\Type("collection[Apixu\Response\Forecast\ForecastDay]")
     */
    private $forecastDay;

    /**
     * @return Collection[Apixu\Response\Forecast\ForecastDay]
     */
    public function getForecastDay() : Collection
    {
        return $this->forecastDay;
    }
}
