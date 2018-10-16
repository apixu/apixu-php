<?php

namespace Apixu\Response\Forecast;

use Serializer\Collection;
use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class ForecastDay implements ToArrayInterface
{
    use ToArrayTrait;

    /**
     * @var \DateTime|null
     *
     * @Serializer\Property("date")
     * @Serializer\Type("DateTime", "Y-m-d")
     */
    private $date;

    /**
     * @var int|null
     *
     * @Serializer\Property("date_epoch")
     * @Serializer\Type("int")
     */
    private $dateEpoch;

    /**
     * @var Day
     *
     * @Serializer\Property("day")
     * @Serializer\Type("Apixu\Response\Forecast\Day")
     */
    private $day;

    /**
     * @var Astro
     *
     * @Serializer\Property("astro")
     * @Serializer\Type("Apixu\Response\Forecast\Astro")
     */
    private $astro;

    /**
     * @var Collection[Apixu\Response\Forecast\Hour]
     *
     * @Serializer\Property("hour")
     * @Serializer\Type("collection[Apixu\Response\Forecast\Hour]")
     */
    private $hour;

    /**
     * @return \DateTime|null
     */
    public function getDate() : ?\DateTime
    {
        return $this->date;
    }

    /**
     * @return int|null
     */
    public function getDateEpoch() : ?int
    {
        return $this->dateEpoch;
    }

    /**
     * @return Day
     */
    public function getDay() : Day
    {
        return $this->day;
    }

    /**
     * @return Astro
     */
    public function getAstro() : Astro
    {
        return $this->astro;
    }

    /**
     * @return Collection[Apixu\Response\Forecast\Hour]
     */
    public function getHour() : Collection
    {
        return $this->hour;
    }
}
