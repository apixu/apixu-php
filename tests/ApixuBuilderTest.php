<?php

namespace Apixu\Tests;

use Apixu\ApixuBuilder;
use Apixu\ApixuInterface;
use Apixu\Exception\ApixuException;
use Apixu\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ApixuBuilderTest extends TestCase
{
    public function testBuild()
    {
        $apixu = ApixuBuilder::instance()->setApiKey('a')->build();
        $this->assertInstanceOf(ApixuInterface::class, $apixu);
    }

    public function testBuildWithMissingApiKey()
    {
        try {
            ApixuBuilder::instance()->setApiKey(' ');
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(InvalidArgumentException::class, $e);
        }
    }
}
