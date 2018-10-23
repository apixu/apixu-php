<?php declare(strict_types = 1);

namespace Apixu;

final class Factory
{
    /**
     * Creates Apixu instance by api key
     *
     * @param string $apiKey
     * @return \Apixu\ApixuInterface
     * @throws \Apixu\Exception\ApiKeyMissingException
     * @throws \Serializer\Format\UnknownFormatException
     */
    public static function create(string $apiKey) : ApixuInterface
    {
        return ApixuBuilder::instance()->setApiKey($apiKey)->build();
    }
}
