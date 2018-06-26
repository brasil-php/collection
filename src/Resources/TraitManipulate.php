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
        array_push($this->records, $record);
        return $this->length();
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->records);
    }
}