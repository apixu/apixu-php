<?php declare(strict_types = 1);

namespace Apixu;

use Apixu\Exception\ApixuException;
use Apixu\Exception\ErrorException;
use Apixu\Exception\InternalServerErrorException;
use Apixu\Response\Conditions;
use GuzzleHttp\ClientInterface;
use Serializer\SerializerInterface;

class Apixu implements ApixuInterface
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param string $apiKey
     * @param ClientInterface $httpClient
     * @param SerializerInterface $serializer
     */
    public function __construct(string $apiKey, ClientInterface $httpClient, SerializerInterface $serializer)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function conditions() : Conditions
    {
        $url = sprintf(Config::DOC_WEATHER_CONDITIONS_URL, Config::FORMAT);

        return $this->call($url, Conditions::class);
    }

    /**
     * @param string $url
     * @return array
     * @throws ApixuException
     * @throws \Exception
     * @throws \ErrorException
     */
    private function call(string $url, string $class)
    {
        try {
            $res = $this->httpClient->request('GET', $url);
            $status = $res->getStatusCode();

            if ($status >= StatusCodes::INTERNAL_SERVER_ERROR) {
                throw new InternalServerErrorException();
            }

            $data = $res->getBody()->getContents();

            if ($status !== StatusCodes::OK) {
                $response = $this->serializer->unserialize($data, 'errorresponse::class');
                throw new ErrorException($response['message'], $response['code']);
            }

            return $this->serializer->unserialize($data, $class);
        } catch (ApixuException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new ApixuException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
