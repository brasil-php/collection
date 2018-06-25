<?php

namespace PhpBrasil\Collection;

use RuntimeException;
use function PhpBrasil\Collection\Helper\prop;

/**
 * Trait CollectionMethods
 * @package PhpBrasil\Collection
 */
trait CollectionMethods
{
    /**
     * @var array
     */
    protected $array = [];

    /**
     * @param callable $callback
     * @param bool $clear
     * @return Collection
     */
    public function reduce(callable $callback, $clear = true)
    {
        $array = array_reduce($this->array, $callback, []);
        if (!is_array($array)) {
            throw new RuntimeException("The response of '\$callback' must be an array");
        }
        if ($clear) {
            $array = array_values($array);
        }
        return $this->create($array);
    }

    /**
     * @param callable $callback
     * @return Collection
     */
    public function map(callable $callback)
    {
        $array = array_map($callback, $this->array, array_keys($this->array));
        return $this->create($array);
    }

    /**
     * @param callable $callback
     * @return Collection
     */
    public function filter(callable $callback = null)
    {
        if (!is_null($callback)) {
            $array = array_filter($this->array, $callback, ARRAY_FILTER_USE_BOTH);
        }
        if (!isset($array)) {
            $array = array_filter($this->array);
        }
        return $this->create($array);
    }

    /**
     * @param string $property
     * @return Collection
     */
    public function pluck($property)
    {
        $array = array_map(function ($item) use ($property) {
            return prop($item, $property);
        }, $this->array);
        return $this->create($array);
    }

    /**
     * @return int
     */
    public function length()
    {
        return $this->count();
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return ($this->count() == 0);
    }
}
