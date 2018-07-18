<?php

namespace Apixu\Tests;

use Apixu\ApiInterface;
use Apixu\Apixu;
use Apixu\Config;
use PHPUnit\Framework\TestCase;

class ApixuTest extends TestCase
{
    public function testApi()
    {
        $config = new Config();
        $config->setApiKey("apikey");

        $api = Apixu::api($config);
        $this->assertInstanceOf(ApiInterface::class, $api);
    }

    /**
     * @expectedException \Apixu\Exception\ConfigException
     */
    public function testApiWithMissingApiKey()
    {
        $config = new Config();
        $config->setApiKey(" ");

        Apixu::api($config);
    }
}
