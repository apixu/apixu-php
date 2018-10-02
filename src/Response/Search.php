<?php

namespace Apixu\Response;

use Serializer\Collection;

/**
 * @Serializer\Collection("Apixu\Response\Location")
 */
class Search extends Collection implements ToArrayInterface
{
    /**
     * @return array
     */
    public function toArray() : array
    {
        $data = [];
        /** @var Location $item */
        foreach ($this as $item) {
            $data[] = $item->toArray();
        }

        return $data;
    }
}
