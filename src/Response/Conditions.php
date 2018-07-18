<?php

namespace Apixu\Response;

class Conditions extends Collection
{
    /**
     * @return Condition
     */
    public function current()
    {
        return new Condition($this->data[$this->i]);
    }
}
