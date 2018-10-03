<?php

namespace Apixu\Response;

use Serializer\Collection;
use Serializer\ToArray\ToArrayInterface;
use Serializer\ToArray\ToArrayTrait;

/**
 * @Serializer\Collection("Apixu\Response\Condition")
 */
class Conditions extends Collection implements ToArrayInterface
{
    use ToArrayTrait;
}
