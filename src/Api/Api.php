<?php declare(strict_types = 1);

namespace Apixu\Api;

use Apixu\Exception\ApixuException;
use Apixu\Exception\ErrorException;
use Apixu\Exception\InternalServerErrorException;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\StreamInterface;

class Api implements ApiInterface
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * {@inheritdoc}
     */
    public function call(string $url) : StreamInterface
    {
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
}
