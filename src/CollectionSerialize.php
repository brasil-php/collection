<?php

namespace PhpBrasil\Collection;

/**
 * Trait CollectionSerialize
 * @package PhpBrasil\Collection
 */
trait CollectionSerialize
{
    /**
     * @var array
     */
    protected $records = [];

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize($this->records);
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        $this->records = unserialize($serialized);
    }
}
