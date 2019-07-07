<?php declare(strict_types = 1);

namespace Apixu;

final class Factory
{
    /**
     * Creates Apixu instance by api key
     *
     * @param string $apiKey
     * @param null|string $language
     * @return \Apixu\ApixuInterface
     * @throws \Apixu\Exception\ApiKeyMissingException
     * @throws \Serializer\Format\UnknownFormatException
     */
    public static function create(string $apiKey, string $language = null) : ApixuInterface
    {
        $builder = ApixuBuilder::instance()->setApiKey($apiKey);

        if ($language !== null) {
            $builder->setLanguage($language);
        }

        return $builder->build();
    }
}
