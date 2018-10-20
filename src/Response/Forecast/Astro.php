<?php

namespace Apixu\Response\Forecast;

class Astro
{
    /**
     * @var string|null
     *
     * @Serializer\Property("sunrise")
     * @Serializer\Type("string")
     * @Serializer\IgnoreNull()
     */
    private $sunrise;

    /**
     * @var string|null
     *
     * @Serializer\Property("sunset")
     * @Serializer\Type("string")
     * @Serializer\IgnoreNull()
     */
    private $sunset;

    /**
     * @var string|null
     *
     * @Serializer\Property("moonrise")
     * @Serializer\Type("string")
     * @Serializer\IgnoreNull()
     */
    private $moonrise;

    /**
     * @var string|null
     *
     * @Serializer\Property("moonset")
     * @Serializer\Type("string")
     * @Serializer\IgnoreNull()
     */
    private $moonset;

    /**
     * @return string|null
     */
    public function getSunrise() : ?string
    {
        return $this->sunrise;
    }

    /**
     * @return string|null
     */
    public function getSunset() : ?string
    {
        return $this->sunset;
    }

    /**
     * @return string|null
     */
    public function getMoonrise() : ?string
    {
        return $this->moonrise;
    }

    /**
     * @return string|null
     */
    public function getMoonset() : ?string
    {
        return $this->moonset;
    }
}
