<?php

namespace Apixu\Response;

use Serializer\Collection;
use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

/**
 * @Serializer\Collection("Apixu\Response\Location")
 */
class Search extends Collection implements ToArrayInterface
{
    use ToArrayTrait;
}
