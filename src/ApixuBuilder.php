<?php declare(strict_types = 1);

namespace Apixu;

use Apixu\Api\Api;
use Apixu\Exception\ApixuException;
use Apixu\Exception\InvalidArgumentException;
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
     * @throws InvalidArgumentException
     */
    public function setApiKey(string $apiKey) : ApixuBuilder
    {
        if (trim($apiKey) === '') {
            throw new InvalidArgumentException('API key not set.');
        }

        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @return ApixuInterface
     * @throws ApixuException
     */
    public function build() : ApixuInterface
    {
        try {
            $httpClient = new Client([
                'timeout' => Config::HTTP_TIMEOUT,
            ]);

            $serializer = SerializerBuilder::instance()
                ->setFormat(Config::FORMAT)
                ->build();
        } catch (\Exception $e) {
            throw new ApixuException(sprintf('Build error: %s', $e->getMessage()), $e->getCode(), $e);
        }

        $api = new Api($this->apiKey, $httpClient);

        return new Apixu($api, $serializer);
    }
}
