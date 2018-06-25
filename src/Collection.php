<?php

namespace PhpBrasil\Collection;

use RuntimeException;
use function PhpBrasil\Collection\Helper\prop;
use function PhpBrasil\Collection\Helper\stringify;

/**
 * Class Collection
 * @package PhpBrasil\Collection
 */
class Collection
{
    /**
     * @var array
     */
    private $array = [];

    /**
     * Collection constructor.
     * @param array $input
     */
    public function __construct($input = [])
    {
        $this->array = $input;
    }

    /**
     * @param array $array
     * @return Collection
     */
    public static function create(array $array = [])
    {
        return new static($array);
    }

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
        return new static($array);
    }

    /**
     * @param callable $callback
     * @return Collection
     */
    public function map(callable $callback)
    {
        $array = array_map($callback, $this->array, array_keys($this->array));
        return new static($array);
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
        return new static($array);
    }

    /**
     * @param mixed $property
     * @return array
     */
    public function pluck($property)
    {
        if (!is_array($property)) {
            $property = [$property];
        }
        return array_map(function ($item) use ($property) {
            return prop($item, $property);
        }, $this->array);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return strval(stringify($this->array));
    }
}