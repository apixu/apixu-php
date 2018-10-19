<?php

namespace Apixu\Response;

class Location
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
     * @var string|null
     *
     * @Serializer\Property("url")
     * @Serializer\Type("string")
     */
    private $url;

    /**
     * @var string|null
     *
     * @Serializer\Property("tz_id")
     * @Serializer\Type("string")
     */
    private $timezone;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     * @Serializer\Property("localtime_epoch")
     */
    private $localtimeEpoch;

    /**
     * @var \DateTime|null
     *
     * @Serializer\Property("localtime")
     * @Serializer\Type("DateTime", "Y-m-d H:i")
     */
    private $localtime;

    /**
     * @return int|null
     */
    public function getId() : ?int
    {
        return $this->id;
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
    public function getUrl() : ?string
    {
        return $this->url;
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
