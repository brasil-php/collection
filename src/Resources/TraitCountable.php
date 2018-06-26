<?php

namespace PhpBrasil\Collection\Resources;

/**
 * Trait TraitCountable
 * @package PhpBrasil\Collection\Resources
 */
trait TraitCountable
{
    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->records);
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
