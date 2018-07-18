<?php

namespace Apixu\Tests;

use Apixu\Apixu;
use Apixu\Config;
use PHPUnit\Framework\TestCase;

class ApixuTest extends TestCase
{
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
