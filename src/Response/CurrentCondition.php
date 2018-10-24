<?php declare(strict_types = 1);

namespace Apixu\Response;

class CurrentCondition
{
    /**
     * @var string|null
     *
     * @Serializer\Property("text")
     * @Serializer\Type("string")
     * @Serializer\IgnoreNull()
     */
    private $text;

    /**
     * @var string|null
     *
     * @Serializer\Property("icon")
     * @Serializer\Type("string")
     * @Serializer\IgnoreNull()
     */
    private $icon;

    /**
     * @var int|null
     *
     * @Serializer\Property("code")
     * @Serializer\Type("int")
     * @Serializer\IgnoreNull()
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
