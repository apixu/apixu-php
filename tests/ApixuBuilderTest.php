<?php declare(strict_types = 1);

namespace Apixu\Tests;

use Apixu\ApixuBuilder;
use Apixu\ApixuInterface;
use Apixu\Exception\ApixuException;
use Apixu\Exception\ApiKeyMissingException;
use Apixu\Exception\LanguageMissingException;
use PHPUnit\Framework\TestCase;

class ApixuBuilderTest extends TestCase
{
    public function testBuild()
    {
        $apixu = ApixuBuilder::instance()
            ->setApiKey('a')
            ->setLanguage('en')
            ->build();
        $this->assertInstanceOf(ApixuInterface::class, $apixu);
    }

    public function testBuildWithMissingApiKey()
    {
        try {
            ApixuBuilder::instance()->setApiKey(' ');
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(ApiKeyMissingException::class, $e);
        }
    }

    public function testBuildWithMissingLanguage()
    {
        try {
            ApixuBuilder::instance()->setLanguage(' ');
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(LanguageMissingException::class, $e);
        }
    }
}
