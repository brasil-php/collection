<?php

namespace PhpBrasil\Collection\Resources;

use function array_keys;
use function PhpBrasil\Collection\Helper\prop;

/**
 * Trait TraitMutate
 * @package PhpBrasil\Collection\Resources
 */
trait TraitMutate
{
    /**
     * @param string $property
     * @return array
     */
    public function pluck($property)
    {
        $array = array_map(function ($item) use ($property) {
            return prop($item, $property);
        }, $this->records);
        return $array;
    }

    /**
     * @return array
     */
    public function keys()
    {
        return array_keys($this->records);
    }

    /**
     * @param callable $callback
     * @param mixed $initial
     * @return mixed
     */
    public function reduce(callable $callback, $initial = null)
    {
        $accumulator = $initial;
        $records = $this->records;
        $array = $this->records;
        array_walk($records, function($value, $key) use(&$accumulator, $callback, $array) {
            $accumulator = $callback($accumulator, $value, $key, $array);
        });
        return $accumulator;
    }
}