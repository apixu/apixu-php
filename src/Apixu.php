<?php

namespace Apixu;

use Apixu\Exception\ConfigException;
use GuzzleHttp\Client;

final class Apixu
{
    /**
     * @param Config $config
     * @return ApiInterface
     * @throws ConfigException
     */
    public static function api(Config $config)
    {
        if (trim($config->getApiKey()) == '') {
            throw new ConfigException('API key not set.');
        }

        $httpClient = new Client([
            'timeout' => Config::HTTP_TIMEOUT,
        ]);

        return new Api($config, $httpClient);
    }
}
