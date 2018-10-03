<?php

namespace Apixu\Response\Forecast;

use Serializer\Collection;
use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class ForecastWeather implements ToArrayInterface
{
    use ToArrayTrait;

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
