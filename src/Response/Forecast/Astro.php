<?php

namespace Apixu\Response\Forecast;

use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class Astro implements ToArrayInterface
{
    use ToArrayTrait;

    /**
     * @var null|string
     *
     * @Serializer\Property("sunrise")
     * @Serializer\Type("string")
     */
    private $sunrise;

    /**
     * @var null|string
     *
     * @Serializer\Property("sunset")
     * @Serializer\Type("string")
     */
    private $sunset;

    /**
     * @var null|string
     *
     * @Serializer\Property("moonrise")
     * @Serializer\Type("string")
     */
    private $moonrise;

    /**
     * @var null|string
     *
     * @Serializer\Property("moonset")
     * @Serializer\Type("string")
     */
    private $moonset;

    /**
     * @return null|string
     */
    public function getSunrise() : string
    {
        return $this->sunrise;
    }

    /**
     * @return null|string
     */
    public function getSunset() : string
    {
        return $this->sunset;
    }

    /**
     * @return null|string
     */
    public function getMoonrise() : string
    {
        return $this->moonrise;
    }

    /**
     * @return null|string
     */
    public function getMoonset() : string
    {
        return $this->moonset;
    }
}
