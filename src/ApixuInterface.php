<?php

namespace Apixu;

use Apixu\Exception\ApixuException;
use Apixu\Exception\ErrorException;
use Apixu\Response\Conditions;

interface ApixuInterface
{
    /**
     * List of weather conditions
     *
     * @return Conditions
     * @throws ApixuException
     * @throws ErrorException
     */
    public function conditions() : Conditions;
}
