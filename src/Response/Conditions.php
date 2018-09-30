<?php

namespace Apixu\Response;

use Serializer\Collection;

/**
 * @Serializer\Collection("Apixu\Response\Condition")
 */
class Conditions extends Collection implements ToArrayInterface
{
    /**
     * @return array
     */
    public function toArray() : array
    {
        $data = [];
        /** @var Condition $item */
        foreach ($this as $item) {
            $data[] = $item->toArray();
        }

        return $data;
    }
}
