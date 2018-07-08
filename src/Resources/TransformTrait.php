<?php

namespace PhpBrasil\Collection\Resources;

use PhpBrasil\Collection\Pack;

/**
 * Trait TransformTrait
 * @package PhpBrasil\Collection\Resources
 */
trait TransformTrait
{
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
        return $this->build(array_values($array));
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
