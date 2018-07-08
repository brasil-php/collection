<?php

namespace PhpBrasil\Collection;

use PhpBrasil\Collection\Contract\RecordInterface;
use RuntimeException;

/**
 * Class Fetch
 * @package PhpBrasil\Collection
 */
class Fetch extends Records
{
    /**
     * @var string
     */
    protected $fetch = '';

    /**
     * Records constructor.
     * @param array $array
     * @param string $fetch
     */
    public function __construct($array = [], $fetch = '')
    {
        parent::__construct($array);
        $this->fetch = $fetch;
    }

    /**
     * @param array $array
     * @param string $fetch
     * @return Fetch
     */
    public static function create(array $array = [], $fetch = '')
    {
        return new static($array, $fetch);
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        $current = parent::current();
        if (!$this->fetch) {
            return $current;
        }
        return $this->fillWithRecord($current);
    }

    /**
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        $current = parent::offsetGet($offset);
        if (!$this->fetch) {
            return $current;
        }
        return $this->fillWithRecord($current);
    }

    /**
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        if (!in_array(RecordInterface::class, class_implements($value))) {
            throw new RuntimeException("The value to set not implements fillable");
        }
        /** @var RecordInterface $value */
        parent::offsetSet($offset, $value->dumpRecord());
    }

    /**
     * @param mixed $record
     * @return mixed
     */
    public function fillWithRecord($record)
    {
        if (!class_exists($this->fetch)) {
            throw new RuntimeException("Fetch '{$this->fetch}' is not a valid class");
        }
        if (!in_array(RecordInterface::class, class_implements($this->fetch))) {
            throw new RuntimeException("Fetch '{$this->fetch}' not implements fillable");
        }
        /** @noinspection PhpUndefinedMethodInspection */
        $instance = new $this->fetch;
        /** @noinspection PhpUndefinedMethodInspection */
        $instance->fillWithRecord($record);

        return $instance;
    }
}
