<?php

namespace Apixu;

use Apixu\Response\Conditions;

interface ApiInterface
{
    /**
     * Retrieves list of weather conditions
     * 
     * @return Conditions
     */
    public function conditions();
}
