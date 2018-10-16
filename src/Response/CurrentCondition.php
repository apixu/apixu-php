<?php

namespace Apixu\Response;

use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

class CurrentCondition implements ToArrayInterface
{
    use ToArrayTrait;

    /**
     * @var string|null
     *
     * @Serializer\Property("text")
     * @Serializer\Type("string")
     */
    private $text;

    /**
     * @var string|null
     *
     * @Serializer\Property("icon")
     * @Serializer\Type("string")
     */
    private $icon;

    /**
     * @var int|null
     *
     * @Serializer\Property("code")
     * @Serializer\Type("int")
     */
    private $code;

    /**
     * @return string|null
     */
    public function getText() : ?string
    {
        return $this->text;
    }

    /**
     * @return string|null
     */
    public function getIcon() : ?string
    {
        return $this->icon;
    }

    /**
     * @return int|null
     */
    public function getCode() : ?int
    {
        return $this->code;
    }
}
