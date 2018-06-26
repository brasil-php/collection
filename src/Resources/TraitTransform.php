<?php

namespace PhpBrasil\Collection\Resources;

use PhpBrasil\Collection\Pack;
use RuntimeException;
use function PhpBrasil\Collection\Helper\prop;

/**
 * Trait TraitTransform
 * @package PhpBrasil\Collection\Resources
 */
trait TraitTransform
{
    /**
     * @param callable $callback
     * @param bool $clear
     * @return Pack
     */
    public function reduce(callable $callback, $clear = true)
    {
        $array = array_reduce($this->records, $callback, []);
        if (!is_array($array)) {
            throw new RuntimeException("The response of '\$callback' must be an array");
        }
        if ($clear) {
            $array = array_values($array);
        }
        return $this->build($array);
    }

    /**
     * @param callable $callback
     * @return Pack
     */
    public function map(callable $callback)
    {
        $array = array_map($callback, $this->records, array_keys($this->records));
        return $this->build($array);
    }

    /**
     * @param callable $callback
     * @return Pack
     */
    public function filter(callable $callback = null)
    {
        if (!is_null($callback)) {
            $array = array_filter($this->records, $callback, ARRAY_FILTER_USE_BOTH);
        }
        if (!isset($array)) {
            $array = array_filter($this->records);
        }
        return $this->build($array);
    }

    /**
     * @param string $property
     * @return Pack
     */
    public function pluck($property)
    {
        $array = array_map(function ($item) use ($property) {
            return prop($item, $property);
        }, $this->records);
        return $this->build($array);
    }

    /**
     * @param array $array
     * @return Pack|mixed
     */
    public function build(array $array)
    {
        if (!method_exists($this, 'create')) {
            /** @noinspection PhpMethodParametersCountMismatchInspection */
            return new static($array);
        }
        return $this->create($array);
    }
}
