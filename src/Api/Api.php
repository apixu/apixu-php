<?php declare(strict_types = 1);

namespace Apixu\Api;

use Apixu\Config;
use Apixu\Exception\ApixuException;
use Apixu\Exception\ErrorException;
use Apixu\Exception\InternalServerErrorException;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\StreamInterface;

class Api implements ApiInterface
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
     * @param string $apiKey
     * @param ClientInterface $httpClient
     */
    public function __construct(string $apiKey, ClientInterface $httpClient)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
    }

    /**
     * {@inheritdoc}
     */
    public function call(string $method, array $params = []) : StreamInterface
    {
        $url = $this->getApiUrl($method, $params);

        try {
            $res = $this->httpClient->request('GET', $url);
            $status = $res->getStatusCode();

            if ($status >= StatusCodes::INTERNAL_SERVER_ERROR) {
                throw new InternalServerErrorException();
            }

            if ($status !== StatusCodes::OK) {
                $response = json_decode($res->getBody()->getContents(), true);
                throw new ErrorException($response['message'], $response['code']);
            }

            return $res->getBody();
        } catch (ApixuException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new ApixuException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $method
     * @param array $params
     * @return string
     */
    private function getApiUrl(string $method, array $params = [])
    {
        $query = '';
        if (count($params) > 0) {
            $query = '&' . http_build_query($params);
        }

        if (filter_var($method, FILTER_VALIDATE_URL)) {
            return $method;
        }

        return sprintf(
            Config::API_URL,
            Config::API_VERSION,
            $method,
            Config::FORMAT,
            $this->apiKey,
            $query
        );
    }
}
