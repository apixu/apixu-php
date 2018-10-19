<?php

namespace Apixu\Response;

class CurrentCondition
{
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
