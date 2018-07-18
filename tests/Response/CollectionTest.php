<?php

namespace Apixu\Tests\Response;

use Apixu\Response\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    private $data = [
        1,
        2,
    ];

    public function testIterate()
    {
        $collection = new Collection($this->data);
        foreach ($collection as $key => $item) {
            $this->assertSame($this->data[$key], $item);
        }

        foreach ($collection as $key => $item) {
            $this->assertSame($this->data[$key], $item);
        }
    }

    public function testCount()
    {
        $collection = new Collection($this->data);
        $this->assertSame(count($this->data), $collection->count());
    }

    public function testToArray()
    {
        $collection = new Collection($this->data);
        $this->assertSame($this->data, $collection->toArray());
    }
}
