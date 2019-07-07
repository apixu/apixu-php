<?php declare(strict_types = 1);

namespace Apixu\Tests;

use Apixu\ApixuInterface;
use Apixu\Exception\ApiKeyMissingException;
use Apixu\Exception\ApixuException;
use Apixu\Exception\LanguageMissingException;
use Apixu\Factory;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testCreate()
    {
        $apixu = Factory::create('apikey');
        $this->assertInstanceOf(ApixuInterface::class, $apixu);
    }

    public function testCreateWithMissingApiKey()
    {
        try {
            Factory::create(' ');
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(ApiKeyMissingException::class, $e);
        }
    }

    public function testCreateWithMissingLanguage()
    {
        try {
            Factory::create('apikey', ' ');
            $this->fail('No exception was thrown');
        } catch (\Exception $e) {
            $this->assertInstanceOf(ApixuException::class, $e);
            $this->assertInstanceOf(LanguageMissingException::class, $e);
        }
    }
}
