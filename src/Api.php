<?php

namespace Apixu;

use Apixu\Exception\ApixuException;
use Apixu\Exception\ErrorException;
use Apixu\Exception\InternalServerErrorException;
use Apixu\Response\Conditions;
use GuzzleHttp\ClientInterface;

class Api implements ApiInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @param Config $config
     * @param ClientInterface $httpClient
     */
    public function __construct(Config $config, ClientInterface $httpClient)
    {
        $this->config = $config;
        $this->httpClient = $httpClient;
    }

    /**
     * {@inheritdoc}
     */
    public function conditions() : Conditions
    {
        $url = sprintf(Config::DOC_WEATHER_CONDITIONS_URL, Config::FORMAT);
        $data = $this->call($url);

        return new Conditions($data);
    }

    /**
     * @param string $url
     * @return array
     * @throws ApixuException
     * @throws \Exception
     */
    private function call($url)
    {
        try {
            $res = $this->httpClient->request('GET', $url);
            $status = $res->getStatusCode();

            if ($status >= 500) {
                throw new InternalServerErrorException();
            }

            $response = $this->decode($res->getBody()->getContents());
            if ($status != 200) {
                throw new ErrorException($response['message'], $response['code']);
            }

            return $response;
        } catch (ApixuException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new ApixuException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $content
     * @return array
     */
    private function decode($content)
    {
        return \GuzzleHttp\json_decode($content, true);
    }
}
