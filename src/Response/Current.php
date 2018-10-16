<?php

namespace Apixu\Response;

use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class Current implements ToArrayInterface
{
    use ToArrayTrait;

    /**
     * @var int|null
     *
     * @Serializer\Property("last_updated_epoch")
     * @Serializer\Type("int")
     */
    private $lastUpdatedEpoch;

    /**
     * @var \DateTime|null
     *
     * @Serializer\Property("last_updated")
     * @Serializer\Type("DateTime", "Y-m-d H:i")
     */
    private $lastUpdated;

    /**
     * @var float|null
     *
     * @Serializer\Property("temp_c")
     * @Serializer\Type("float")
     */
    private $tempCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("temp_f")
     * @Serializer\Type("float")
     */
    private $tempFahrenheit;

    /**
     * @var bool|null
     *
     * @Serializer\Property("is_day")
     * @Serializer\Type("bool")
     */
    private $day;

    /**
     * @var \Apixu\Response\CurrentCondition
     *
     * @Serializer\Property("Condition")
     * @Serializer\Type("Apixu\Response\CurrentCondition")
     */
    private $condition;

    /**
     * @var float|null
     *
     * @Serializer\Property("wind_mph")
     * @Serializer\Type("float")
     */
    private $windMPH;

    /**
     * @var float|null
     *
     * @Serializer\Property("wind_kph")
     * @Serializer\Type("float")
     */
    private $windKPH;

    /**
     * @var int|null
     *
     * @Serializer\Property("wind_degree")
     * @Serializer\Type("int")
     */
    private $windDegree;

    /**
     * @var string|null
     *
     * @Serializer\Property("wind_dir")
     * @Serializer\Type("string")
     */
    private $windDirection;

    /**
     * @var float|null
     *
     * @Serializer\Property("pressure_mb")
     * @Serializer\Type("float")
     */
    private $pressureMB;

    /**
     * @var float|null
     *
     * @Serializer\Property("pressure_in")
     * @Serializer\Type("float")
     */
    private $pressureIN;

    /**
     * @var float|null
     *
     * @Serializer\Property("precip_mm")
     * @Serializer\Type("float")
     */
    private $precipMM;

    /**
     * @var float|null
     *
     * @Serializer\Property("precip_in")
     * @Serializer\Type("float")
     */
    private $precipIN;

    /**
     * @var int|null
     *
     * @Serializer\Property("humidity")
     * @Serializer\Type("int")
     */
    private $humidity;

    /**
     * @var int|null
     *
     * @Serializer\Property("cloud")
     * @Serializer\Type("int")
     */
    private $cloud;

    /**
     * @var float|null
     *
     * @Serializer\Property("feelslike_c")
     * @Serializer\Type("float")
     */
    private $feelsLikeCelsius;

    /**
     * @var float|null
     *
     * @Serializer\Property("feelslike_f")
     * @Serializer\Type("float")
     */
    private $feelsLikeFahrenheit;

    /**
     * @var float|null
     *
     * @Serializer\Property("vis_km")
     * @Serializer\Type("float")
     */
    private $visKM;

    /**
     * @var float|null
     *
     * @Serializer\Property("vis_miles")
     * @Serializer\Type("float")
     */
    private $visMiles;

    /**
     * @return int|null
     */
    public function getLastUpdatedEpoch() : ?int
    {
        return $this->lastUpdatedEpoch;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastUpdated() : ?\DateTime
    {
        return $this->lastUpdated;
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
    public function isDay() : ?bool
    {
        return $this->day;
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
    public function getWindKPH() : ?float
    {
        return $this->windKPH;
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
