<?php

namespace Apixu\Response;

class Location implements ToArrayInterface
{
    /**
     * @var int|null
     *
     * @Serializer\Property("id")
     * @Serializer\Type("string")
     */
    private $id;

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
        $data = [];

        if ($this->getId() !== null) {
            $data['id'] = $this->getId();
        }

        $data['name'] = $this->getName();
        $data['region'] = $this->getRegion();
        $data['country'] = $this->getCountry();
        $data['lat'] = $this->getLat();
        $data['lon'] = $this->getLon();

        if ($this->getTimezone() !== null) {
            $data['timezone'] = $this->getTimezone();
        }

        if ($this->getTimezone() !== null) {
            $data['localtime_epoch'] = $this->getLocaltimeEpoch();
        }

        if ($this->getLocaltime() !== null) {
            $data['localtime'] = $this->getLocaltime();
        }

        return $data;
    }

    /**
     * @return int
     */
    public function getId() : ?int
    {
        return $this->id; // must be null for current
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
     * @return string|null
     */
    public function getTimezone() : ?string
    {
        return $this->timezone;
    }

    /**
     * @return int|null
     */
    public function getLocaltimeEpoch() : ?int
    {
        return $this->localtimeEpoch;
    }

    /**
     * @return \DateTime|null
     */
    public function getLocaltime() : ?\DateTime
    {
        return $this->localtime;
    }
}
