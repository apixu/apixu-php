<?php

namespace Apixu\Response;

use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class CurrentCondition implements ToArrayInterface
{
    use ToArrayTrait;

    /**
     * @var string
     *
     * @Serializer\Property("text")
     * @Serializer\Type("string")
     */
    private $text;

    /**
     * @var string
     *
     * @Serializer\Property("icon")
     * @Serializer\Type("string")
     */
    private $icon;

    /**
     * @var int
     *
     * @Serializer\Property("code")
     * @Serializer\Type("int")
     */
    private $code;

    /**
     * @return string
     */
    public function getText() : string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getIcon() : string
    {
        return $this->icon;
    }

    /**
     * @return int
     */
    public function getCode() : int
    {
        return $this->code;
    }
}
