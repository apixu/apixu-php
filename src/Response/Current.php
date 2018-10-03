<?php

namespace Apixu\Response;

use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class Current implements ToArrayInterface
{
    use ToArrayTrait;

    /**
     * @var int
     *
     * @Serializer\Property("last_updated_epoch")
     * @Serializer\Type("int")
     */
    private $lastUpdatedEpoch;

    /**
     * @var \DateTime
     *
     * @Serializer\Property("last_updated")
     * @Serializer\Type("DateTime", "Y-m-d H:i")
     */
    private $lastUpdated;

    /**
     * @var float
     *
     * @Serializer\Property("temp_c")
     * @Serializer\Type("float")
     */
    private $tempCelsius;

    /**
     * @var float
     *
     * @Serializer\Property("temp_f")
     * @Serializer\Type("float")
     */
    private $tempFahrenheit;

    /**
     * @var bool
     *
     * @Serializer\Property("is_day")
     * @Serializer\Type("bool")
     */
    private $isDay;

    /**
     * @var \Apixu\Response\CurrentCondition
     *
     * @Serializer\Property("Condition")
     * @Serializer\Type("Apixu\Response\CurrentCondition")
     */
    private $condition;

    /**
     * @var float
     *
     * @Serializer\Property("wind_mph")
     * @Serializer\Type("float")
     */
    private $windMPH;

    /**
     * @var float
     *
     * @Serializer\Property("wind_kph")
     * @Serializer\Type("float")
     */
    private $windKPH;

    /**
     * @var int
     *
     * @Serializer\Property("wind_degree")
     * @Serializer\Type("int")
     */
    private $windDegree;

    /**
     * @var string
     *
     * @Serializer\Property("wind_dir")
     * @Serializer\Type("string")
     */
    private $windDirection;

    /**
     * @var float
     *
     * @Serializer\Property("pressure_mb")
     * @Serializer\Type("float")
     */
    private $pressureMB;

    /**
     * @var float
     *
     * @Serializer\Property("pressure_in")
     * @Serializer\Type("float")
     */
    private $pressureIN;

    /**
     * @var float
     *
     * @Serializer\Property("precip_mm")
     * @Serializer\Type("float")
     */
    private $precipMM;

    /**
     * @var float
     *
     * @Serializer\Property("precip_in")
     * @Serializer\Type("float")
     */
    private $precipIN;

    /**
     * @var int
     *
     * @Serializer\Property("humidity")
     * @Serializer\Type("int")
     */
    private $humidity;

    /**
     * @var int
     *
     * @Serializer\Property("cloud")
     * @Serializer\Type("int")
     */
    private $cloud;

    /**
     * @var float
     *
     * @Serializer\Property("feelslike_c")
     * @Serializer\Type("float")
     */
    private $feelsLikeCelsius;

    /**
     * @var float
     *
     * @Serializer\Property("feelslike_f")
     * @Serializer\Type("float")
     */
    private $feelsLikeFahrenheit;

    /**
     * @var float
     *
     * @Serializer\Property("vis_km")
     * @Serializer\Type("float")
     */
    private $visKM;

    /**
     * @var float
     *
     * @Serializer\Property("vis_miles")
     * @Serializer\Type("float")
     */
    private $visMiles;

    /**
     * @return int
     */
    public function getLastUpdatedEpoch() : int
    {
        return $this->lastUpdatedEpoch;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated() : \DateTime
    {
        return $this->lastUpdated;
    }

    /**
     * @return float
     */
    public function getTempCelsius() : float
    {
        return $this->tempCelsius;
    }

    /**
     * @return float
     */
    public function getTempFahrenheit() : float
    {
        return $this->tempFahrenheit;
    }

    /**
     * @return bool
     */
    public function isDay() : bool
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
     * @return float
     */
    public function getWindMPH() : float
    {
        return $this->windMPH;
    }

    /**
     * @return float
     */
    public function getWindKPH() : float
    {
        return $this->windKPH;
    }

    /**
     * @return int
     */
    public function getWindDegree() : int
    {
        return $this->windDegree;
    }

    /**
     * @return string
     */
    public function getWindDirection() : string
    {
        return $this->windDirection;
    }

    /**
     * @return float
     */
    public function getPressureMB() : float
    {
        return $this->pressureMB;
    }

    /**
     * @return float
     */
    public function getPressureIN() : float
    {
        return $this->pressureIN;
    }

    /**
     * @return float
     */
    public function getPrecipMM() : float
    {
        return $this->precipMM;
    }

    /**
     * @return float
     */
    public function getPrecipIN() : float
    {
        return $this->precipIN;
    }

    /**
     * @return int
     */
    public function getHumidity() : int
    {
        return $this->humidity;
    }

    /**
     * @return int
     */
    public function getCloud() : int
    {
        return $this->cloud;
    }

    /**
     * @return float
     */
    public function getFeelsLikeCelsius() : float
    {
        return $this->feelsLikeCelsius;
    }

    /**
     * @return float
     */
    public function getFeelsLikeFahrenheit() : float
    {
        return $this->feelsLikeFahrenheit;
    }

    /**
     * @return float
     */
    public function getVisKM() : float
    {
        return $this->visKM;
    }

    /**
     * @return float
     */
    public function getVisMiles() : float
    {
        return $this->visMiles;
    }
}
