<?php declare(strict_types = 1);

namespace Apixu\Api;

use Apixu\Exception\ApixuException;
use Apixu\Exception\ErrorException;
use Apixu\Exception\InternalServerErrorException;
use Psr\Http\Message\StreamInterface;

interface ApiInterface
{
    /**
     * @param string $url
     * @return StreamInterface
     * @throws ApixuException
     * @throws InternalServerErrorException
     * @throws ErrorException
     */
    public function call(string $url) : StreamInterface;
}
