<?php

namespace Apixu\Response;

class CurrentWeather implements ToArrayInterface
{
    /**
     * @var Location
     *
     * @Serializer\Property("location")
     * @Serializer\Type("Apixu\Response\Location")
     */
    private $location;

    /**
     * @var Current
     *
     * @Serializer\Property("current")
     * @Serializer\Type("Apixu\Response\Current")
     *
     */
    private $current;

    /**
     * @return array
     */
    public function toArray() : array
    {
        return [
            'location' => $this->getLocation()->toArray(),
            'current' => $this->getCurrent()->toArray(),
        ];
    }

    /**
     * @return Location
     */
    public function getLocation() : Location
    {
        return $this->location;
    }

    /**
     * @return Current
     */
    public function getCurrent() : Current
    {
        return $this->current;
    }
}
