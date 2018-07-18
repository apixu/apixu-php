<?php

namespace Apixu\Response;

class Collection implements \Iterator, \Countable
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var int
     */
    protected $i;

    /**
     * @param array $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->data[$this->i];
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->i++;
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->i;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return array_key_exists($this->i, $this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->i = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}
