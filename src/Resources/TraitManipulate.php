<?php

namespace PhpBrasil\Collection\Resources;

/**
 * Trait TraitManipulate
 * @package PhpBrasil\Collection\Resources
 */
trait TraitManipulate
{
    /**
     * @param mixed $record
     * @return int
     */
    public function push($record)
    {
        return array_push($this->records, $record);
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->records);
    }

    /**
     * @param mixed $record
     * @return int
     */
    public function unShift($record)
    {
        return array_unshift($this->records, $record);
    }

    /**
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->records);
    }

    /**
     * @param array $array
     * @return int
     */
    public function prepend(array $array)
    {
        $this->records = array_merge( $array, $this->records);
        return $this->length();
    }

    /**
     * @param array $array
     * @return int
     */
    public function append(array $array)
    {
        $this->records = array_merge(  $this->records, $array);
        return $this->length();
    }
}