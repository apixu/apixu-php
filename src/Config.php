<?php

namespace Apixu;

class Config
{
    const FORMAT = 'json';
    const API_URL = 'https://api.apixu.com/v%s/%s.%s?key=%s';
    const DOC_WEATHER_CONDITIONS_URL = 'https://www.apixu.com/doc/Apixu_weather_conditions.%s';
    const MAX_QUERY_LENGTH = 256;
    const HTTP_TIMEOUT = 20;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param string $apiKey
     * @return Config
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
}
