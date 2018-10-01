<?php

namespace Apixu\Response;

class CurrentCondition implements ToArrayInterface
{
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
     * @return array
     */
    public function toArray() : array
    {
        return [
            'text' => $this->getText(),
            'icon' => $this->getIcon(),
            'code' => $this->getCode(),
        ];
    }

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
