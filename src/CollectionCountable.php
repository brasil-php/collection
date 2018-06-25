<?php

namespace PhpBrasil\Collection;

/**
 * Trait CollectionCountable
 * @package PhpBrasil\Collection
 */
trait CollectionCountable
{
    /**
     * @var array
     */
    protected $records = [];

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
}
