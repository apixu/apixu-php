<?php

namespace Apixu\Response;

class Condition implements ToArrayInterface
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $day;

    /**
     * @var string
     */
    private $night;

    /**
     * @var int
     */
    private $icon;

    /**
     * @return array
     */
    public function toArray() : array
    {
        return [
            'code' => $this->getCode(),
            'day' => $this->getDay(),
            'night' => $this->getNight(),
            'icon' => $this->getIcon(),
        ];
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return string
     */
    public function getNight()
    {
        return $this->night;
    }

    /**
     * @return int
     */
    public function getIcon()
    {
        return $this->icon;
    }
}
