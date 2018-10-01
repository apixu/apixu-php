<?php

namespace Apixu\Response;

class Location implements ToArrayInterface
{
    /**
     * @var string
     *
     * @Serializer\Property("name")
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @var string
     *
     * @Serializer\Property("region")
     * @Serializer\Type("string")
     */
    private $region;

    /**
     * @var string
     *
     * @Serializer\Property("country")
     * @Serializer\Type("string")
     */
    private $country;

    /**
     * @var float
     *
     * @Serializer\Property("lat")
     * @Serializer\Type("float")
     */
    private $lat;

    /**
     * @var float
     *
     * @Serializer\Property("lon")
     * @Serializer\Type("float")
     */
    private $lon;

    /**
     * @var string
     *
     * @Serializer\Property("tz_id")
     * @Serializer\Type("string")
     */
    private $timezone;

    /**
     * @var int
     *
     * @Serializer\Type("int")
     * @Serializer\Property("localtime_epoch")
     */
    private $localtimeEpoch;

    /**
     * @var \DateTime
     *
     * @Serializer\Property("localtime")
     * @Serializer\Type("DateTime", "Y-m-d H:i")
     */
    private $localtime;

    /**
     * @return array
     */
    public function toArray() : array
    {
        return [
            'name' => $this->getName(),
            'region' => $this->getRegion(),
            'country' => $this->getCountry(),
            'lat' => $this->getLat(),
            'lon' => $this->getLon(),
            'timezone' => $this->getTimezone(),
            'localtime_epoch' => $this->getLocaltimeEpoch(),
            'localtime' => $this->getLocaltime(),
        ];
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRegion() : string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getCountry() : string
    {
        return $this->country;
    }

    /**
     * @return float
     */
    public function getLat() : float
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLon() : float
    {
        return $this->lon;
    }

    /**
     * @return string
     */
    public function getTimezone() : string
    {
        return $this->timezone;
    }

    /**
     * @return int
     */
    public function getLocaltimeEpoch() : int
    {
        return $this->localtimeEpoch;
    }

    /**
     * @return \DateTime
     */
    public function getLocaltime() : \DateTime
    {
        return $this->localtime;
    }
}
