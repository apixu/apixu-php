<?php

namespace Apixu\Response\Forecast;

use Apixu\Response\CurrentCondition;
use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class Day implements ToArrayInterface
{
    use ToArrayTrait;

    /**
     * @var float|null
     *
     * @Serializer\Property("maxtemp_c")
     * @Serializer\Type("float")
     */
    private $maxTempCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("maxtemp_f")
     * @Serializer\Type("float")
     */
    private $maxTempFahrenheit;

    /**
     * @var float|null
     *
     * @Serializer\Property("mintemp_c")
     * @Serializer\Type("float")
     */
    private $minTempCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("mintemp_f")
     * @Serializer\Type("float")
     */
    private $minTempFahrenheit;

    /**
     * @var float|null
     *
     * @Serializer\Property("avgtemp_c")
     * @Serializer\Type("float")
     */
    private $avgTempCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("avgtemp_f")
     * @Serializer\Type("float")
     */
    private $avgTempFahrenheit;

    /**
     * @var float|null
     *
     * @Serializer\Property("maxwind_mph")
     * @Serializer\Type("float")
     */
    private $maxWindMPH;

    /**
     * @var float|null
     *
     * @Serializer\Property("maxwind_kph")
     * @Serializer\Type("float")
     */
    private $maxWindKMH;

    /**
     * @var float|null
     *
     * @Serializer\Property("totalprecip_mm")
     * @Serializer\Type("float")
     */
    private $totalPrecipMM;

    /**
     * @var float|null
     *
     * @Serializer\Property("totalprecip_in")
     * @Serializer\Type("float")
     */
    private $totalPrecipIN;

    /**
     * @var float|null
     *
     * @Serializer\Property("avgvis_km")
     * @Serializer\Type("float")
     */
    private $avgVisKM;

    /**
     * @var float|null
     *
     * @Serializer\Property("avgvis_miles")
     * @Serializer\Type("float")
     */
    private $avgVisMiles;

    /**
     * @var float|null
     *
     * @Serializer\Property("avghumidity")
     * @Serializer\Type("float")
     */
    private $avgHumidity;

    /**
     * @var CurrentCondition|null
     *
     * @Serializer\Property("condition")
     * @Serializer\Type("Apixu\Response\CurrentCondition")
     */
    private $condition;

    /**
     * @var float|null
     *
     * @Serializer\Property("uv")
     * @Serializer\Type("float")
     */
    private $uV;

    /**
     * @return float|null
     */
    public function getMaxTempCelsius() : float
    {
        return $this->maxTempCelsius;
    }

    /**
     * @return float|null
     */
    public function getMaxTempFahrenheit() : float
    {
        return $this->maxTempFahrenheit;
    }

    /**
     * @return float|null
     */
    public function getMinTempCelsius() : float
    {
        return $this->minTempCelsius;
    }

    /**
     * @return float|null
     */
    public function getMinTempFahrenheit() : float
    {
        return $this->minTempFahrenheit;
    }

    /**
     * @return float|null
     */
    public function getAvgTempCelsius() : float
    {
        return $this->avgTempCelsius;
    }

    /**
     * @return float|null
     */
    public function getAvgTempFahrenheit() : float
    {
        return $this->avgTempFahrenheit;
    }

    /**
     * @return float|null
     */
    public function getMaxWindMPH() : float
    {
        return $this->maxWindMPH;
    }

    /**
     * @return float|null
     */
    public function getMaxWindKMH() : float
    {
        return $this->maxWindKMH;
    }

    /**
     * @return float|null
     */
    public function getTotalPrecipMM() : float
    {
        return $this->totalPrecipMM;
    }

    /**
     * @return float|null
     */
    public function getTotalPrecipIN() : float
    {
        return $this->totalPrecipIN;
    }

    /**
     * @return float|null
     */
    public function getAvgVisKM() : float
    {
        return $this->avgVisKM;
    }

    /**
     * @return float|null
     */
    public function getAvgVisMiles() : float
    {
        return $this->avgVisMiles;
    }

    /**
     * @return float|null
     */
    public function getAvgHumidity() : float
    {
        return $this->avgHumidity;
    }

    /**
     * @return CurrentCondition|null
     */
    public function getCondition() : CurrentCondition
    {
        return $this->condition;
    }

    /**
     * @return float|null
     */
    public function getUV() : float
    {
        return $this->uV;
    }
}
