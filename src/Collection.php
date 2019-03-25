<?php

namespace Yorki\Shopify;

class Collection implements \IteratorAggregate, \Countable, \ArrayAccess
{
    /**
     * @var array
     */
    protected $items;

    /**
     * Collection constructor.
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->count() === 0;
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->items[$offset])
            ? $this->items[$offset]
            : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    /**
     * @param int $index
     *
     * @return mixed
     */
    public function at($index)
    {
        return isset($this->items[$index])
            ? $this->items[$index]
            : null;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        foreach ($this as $item) {
            if (is_object($item)) {
                $result[] = $item->toArray();
            } else {
                $result[] = $item;
            }
        }

        return $result;
    }
}