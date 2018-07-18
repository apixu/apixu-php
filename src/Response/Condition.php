<?php

namespace Apixu\Response;

class Condition
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
     * @param array $condition
     */
    public function __construct(array $condition)
    {
        $this->code = $condition['code'];
        $this->day = $condition['day'];
        $this->night = $condition['night'];
        $this->icon = $condition['icon'];
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
