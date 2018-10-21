<?php declare(strict_types = 1);

namespace Apixu\Tests\Response;

use PHPUnit\Framework\TestCase;

abstract class AbstractGettersTest extends TestCase
{
    public function execute(array $vars, string $class)
    {
        $object = new $class();
        $reflection = new \ReflectionClass($class);

        $this->assertCount(
            count($vars),
            $reflection->getProperties(),
            sprintf('Invalid number of properties for class "%s".', $class)
        );

        foreach ($reflection->getProperties() as $property) {
            $value = $vars[$property->getName()];

            $property->setAccessible(true);
            $property->setValue($object, $value);

            $result = null;
            foreach (['get', 'is'] as $m) {
                $method = $m . ucfirst($property->getName());
                if (!$reflection->hasMethod($method)) {
                    continue;
                }

                $result = $object->$method();
            }

            $this->assertSame($value, $result);
        }
    }
}
