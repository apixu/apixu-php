<?php declare(strict_types = 1);

namespace Apixu;

use Apixu\Response\Conditions;
use Serializer\SerializerInterface;

class Apixu implements ApixuInterface
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var ApiInterface
     */
    private $api;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param string $apiKey
     * @param ApiInterface $api
     * @param SerializerInterface $serializer
     */
    public function __construct(string $apiKey, ApiInterface $api, SerializerInterface $serializer)
    {
        $this->apiKey = $apiKey;
        $this->api = $api;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function conditions() : Conditions
    {
        $url = sprintf(Config::DOC_WEATHER_CONDITIONS_URL, Config::FORMAT);
        $response = $this->api->call($url);

        return $this->getResponse($response->getContents(), Conditions::class);
    }

    /**
     * @param string $contents
     * @param string $class
     * @return mixed
     */
    private function getResponse(string $contents, string $class)
    {
        return $this->serializer->unserialize($contents, $class);
    }
}
