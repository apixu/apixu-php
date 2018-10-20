<?php

namespace Apixu\Response\Forecast;

use Apixu\Response\CurrentCondition;

class Hour
{
    /**
     * @var int|null
     *
     * @Serializer\Property("time_epoch")
     * @Serializer\Type("int")
     * @Serializer\IgnoreNull()
     */
    private $timeEpoch;

    /**
     * @var \DateTime|null
     *
     * @Serializer\Property("time")
     * @Serializer\Type("DateTime", "Y-m-d H:i")
     * @Serializer\IgnoreNull()
     */
    private $time;

    /**
     * @var float|null
     *
     * @Serializer\Property("temp_c")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $tempCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("temp_f")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $tempFahrenheit;

    /**
     * @var bool|null
     *
     * @Serializer\Property("bool")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $isDay;

    /**
     * @var CurrentCondition
     *
     * @Serializer\Property("condition")
     * @Serializer\Type("Apixu\Response\CurrentCondition")
     */
    private $condition;

    /**
     * @var float|null
     *
     * @Serializer\Property("wind_mph")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $windMPH;

    /**
     * @var float|null
     *
     * @Serializer\Property("wind_kph")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $windKMH;

    /**
     * @var int|null
     *
     * @Serializer\Property("int")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $windDegree;

    /**
     * @var string|null
     *
     * @Serializer\Property("string")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $windDirection;

    /**
     * @var float|null
     *
     * @Serializer\Property("pressure_mb")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $pressureMB;

    /**
     * @var float|null
     *
     * @Serializer\Property("pressure_in")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $pressureIN;

    /**
     * @var float|null
     *
     * @Serializer\Property("precip_mm")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $precipMM;

    /**
     * @var float|null
     *
     * @Serializer\Property("precip_in")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $precipIN;

    /**
     * @var int|null
     *
     * @Serializer\Property("humidity")
     * @Serializer\Type("int")
     * @Serializer\IgnoreNull()
     */
    private $humidity;

    /**
     * @var int|null
     *
     * @Serializer\Property("int")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $cloud;

    /**
     * @var float|null
     *
     * @Serializer\Property("feelslike_c")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $feelsLikeCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("feelslike_f")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $feelsLikeFahrenheit;

    /**
     * @var float|null
     *
     * @Serializer\Property("windchill_c")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $windChillCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("windchill_f")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $windChillFahrenheit;

    /**
     * @var float|null
     *
     * @Serializer\Property("heatindex_c")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $heatIndexCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("heatindex_f")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $heatIndexFahrenheit;

    /**
     * @var float|null
     *
     * @Serializer\Property("dewpoint_c")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $dewPointCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("dewpoint_f")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $dewPointFahrenheit;

    /**
     * @var bool|null
     *
     * @Serializer\Property("will_it_rain")
     * @Serializer\Type("bool")
     * @Serializer\IgnoreNull()
     */
    private $willItRain;

    /**
     * @var string|null
     *
     * @Serializer\Property("chance_of_rain")
     * @Serializer\Type("string")
     * @Serializer\IgnoreNull()
     */
    private $chanceOfRain;

    /**
     * @var bool|null
     *
     * @Serializer\Property("will_it_snow")
     * @Serializer\Type("bool")
     * @Serializer\IgnoreNull()
     */
    private $willItSnow;

    /**
     * @var string|null
     *
     * @Serializer\Property("chance_of_snow")
     * @Serializer\Type("string")
     * @Serializer\IgnoreNull()
     */
    private $chanceOfSnow;

    /**
     * @var float|null
     *
     * @Serializer\Property("vis_km")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $visKM;

    /**
     * @var float|null
     *
     * @Serializer\Property("vis_miles")
     * @Serializer\Type("float")
     * @Serializer\IgnoreNull()
     */
    private $visMiles;

    /**
     * @return int|null
     */
    public function getTimeEpoch() : ?int
    {
        return $this->timeEpoch;
    }

    /**
     * @return \DateTime|null
     */
    public function getTime() : ?\DateTime
    {
        return $this->time;
    }

    /**
     * @return float|null
     */
    public function getTempCelsius() : ?float
    {
        return $this->tempCelsius;
    }

    /**
     * @return float|null
     */
    public function getTempFahrenheit() : ?float
    {
        return $this->tempFahrenheit;
    }

    /**
     * @return bool|null
     */
    public function getIsDay() : ?bool
    {
        return $this->isDay;
    }

    /**
     * @return CurrentCondition
     */
    public function getCondition() : CurrentCondition
    {
        return $this->condition;
    }

    /**
     * @return float|null
     */
    public function getWindMPH() : ?float
    {
        return $this->windMPH;
    }

    /**
     * @return float|null
     */
    public function getWindKMH() : ?float
    {
        return $this->windKMH;
    }

    /**
     * @return int|null
     */
    public function getWindDegree() : ?int
    {
        return $this->windDegree;
    }

    /**
     * @return string|null
     */
    public function getWindDirection() : ?string
    {
        return $this->windDirection;
    }

    /**
     * @return float|null
     */
    public function getPressureMB() : ?float
    {
        return $this->pressureMB;
    }

    /**
     * @return float|null
     */
    public function getPressureIN() : ?float
    {
        return $this->pressureIN;
    }

    /**
     * @return float|null
     */
    public function getPrecipMM() : ?float
    {
        return $this->precipMM;
    }

    /**
     * @return float|null
     */
    public function getPrecipIN() : ?float
    {
        return $this->precipIN;
    }

    /**
     * @return int|null
     */
    public function getHumidity() : ?int
    {
        return $this->humidity;
    }

    /**
     * @return int|null
     */
    public function getCloud() : ?int
    {
        return $this->cloud;
    }

    /**
     * @return float|null
     */
    public function getFeelsLikeCelsius() : ?float
    {
        return $this->feelsLikeCelsius;
    }

    /**
     * @return float|null
     */
    public function getFeelsLikeFahrenheit() : ?float
    {
        return $this->feelsLikeFahrenheit;
    }

    /**
     * @return float|null
     */
    public function getWindChillCelsius() : ?float
    {
        return $this->windChillCelsius;
    }

    /**
     * @return float|null
     */
    public function getWindChillFahrenheit() : ?float
    {
        return $this->windChillFahrenheit;
    }

    /**
     * @return float|null
     */
    public function getHeatIndexCelsius() : ?float
    {
        return $this->heatIndexCelsius;
    }

    /**
     * @return float|null
     */
    public function getHeatIndexFahrenheit() : ?float
    {
        return $this->heatIndexFahrenheit;
    }

    /**
     * @return float|null
     */
    public function getDewPointCelsius() : ?float
    {
        return $this->dewPointCelsius;
    }

    /**
     * @return float|null
     */
    public function getDewPointFahrenheit() : ?float
    {
        return $this->dewPointFahrenheit;
    }

    /**
     * @return bool|null
     */
    public function getWillItRain() : ?bool
    {
        return $this->willItRain;
    }

    /**
     * @return string|null
     */
    public function getChanceOfRain() : ?string
    {
        return $this->chanceOfRain;
    }

    /**
     * @return bool|null
     */
    public function getWillItSnow() : ?bool
    {
        return $this->willItSnow;
    }

    /**
     * @return string|null
     */
    public function getChanceOfSnow() : ?string
    {
        return $this->chanceOfSnow;
    }

    /**
     * @return float|null
     */
    public function getVisKM() : ?float
    {
        return $this->visKM;
    }

    /**
     * @return float|null
     */
    public function getVisMiles() : ?float
    {
        return $this->visMiles;
    }
}
