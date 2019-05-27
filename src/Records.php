<?php

namespace PhpBrasil\Collection;

use ArrayAccess;
use Countable;
use Iterator;
use JsonSerializable;
use PhpBrasil\Collection\Contract\RecordInterface;
use PhpBrasil\Collection\Resources\ArrayAccessTrait;
use PhpBrasil\Collection\Resources\CountableTrait;
use PhpBrasil\Collection\Resources\IteratorTrait;
use PhpBrasil\Collection\Resources\JsonSerializableTrait;
use PhpBrasil\Collection\Resources\MutateTrait;
use PhpBrasil\Collection\Resources\SerializeTrait;
use PhpBrasil\Collection\Resources\TransformTrait;
use Serializable;
use function PhpBrasil\Collection\Helper\stringify;

/**
 * Class Records
 * @package PhpBrasil\Collection
 */
class Records implements ArrayAccess, Serializable, Countable, Iterator, JsonSerializable, RecordInterface
{
    /**
     * @see TransformTrait
     */
    use TransformTrait;

    /**
     * @see ArrayAccessTrait
     */
    use ArrayAccessTrait;

    /**
     * @see SerializeTrait
     */
    use SerializeTrait;

    /**
     * @see CountableTrait
     */
    use CountableTrait;

    /**
     * @see IteratorTrait
     */
    use IteratorTrait;

    /**
     * @see JsonSerializableTrait
     */
    use JsonSerializableTrait;

    /**
     * @see MutateTrait
     */
    use MutateTrait;

    /**
     * @var array
     */
    protected $records = [];

    /**
     * Records constructor.
     * @param array $array
     */
    public function __construct($array = [])
    {
        $this->records = $array;
    }

    /**
     * @return array
     */
    public function records()
    {
        return $this->records;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return strval(stringify($this->records));
    }

    /**
     * @param mixed $record
     * @return mixed
     */
    public function fillWithRecord($record)
    {
        // TODO: Implement fillWithRecord() method.
    }

    /**
     * @return mixed
     */
    public function dumpRecord()
    {
        return new self($this->records());
    }
}
