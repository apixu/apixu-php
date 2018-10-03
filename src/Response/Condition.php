<?php

namespace Apixu\Response;

use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class Condition implements ToArrayInterface
{
    use ToArrayTrait;

    /**
     * @var int
     *
     * @Serializer\Property("code")
     * @Serializer\Type("int")
     */
    private $code;

    /**
     * @var string
     *
     * @Serializer\Property("day")
     * @Serializer\Type("string")
     */
    private $day;

    /**
     * @var string
     *
     * @Serializer\Property("night")
     * @Serializer\Type("string")
     */
    private $night;

    /**
     * @var int
     *
     * @Serializer\Property("icon")
     * @Serializer\Type("int")
     */
    private $icon;

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
