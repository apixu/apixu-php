<?php declare(strict_types = 1);

namespace Apixu;

use Apixu\Api\Api;
use Apixu\Exception\ApiKeyMissingException;
use GuzzleHttp\Client;
use Serializer\SerializerBuilder;

final class ApixuBuilder
{
    /**
     * @return ApixuBuilder
     */
    public static function instance() : ApixuBuilder
    {
        return new static();
    }

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param string $apiKey
     * @return ApixuBuilder
     * @throws ApiKeyMissingException
     */
    public function setApiKey(string $apiKey) : ApixuBuilder
    {
        if (trim($apiKey) === '') {
            throw new ApiKeyMissingException('API key not set.');
        }

        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @return ApixuInterface
     */
    public function build() : ApixuInterface
    {
        $httpClient = new Client([
            'timeout' => Config::HTTP_TIMEOUT,
        ]);

        $serializer = SerializerBuilder::instance()
            ->setFormat(Config::FORMAT)
            ->build();

        $api = new Api($this->apiKey, $httpClient);

        return new Apixu($api, $serializer);
    }
}
