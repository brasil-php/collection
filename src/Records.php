<?php

namespace PhpBrasil\Collection;

use ArrayAccess;
use Countable;
use Iterator;
use JsonSerializable;
use PhpBrasil\Collection\Resources\TraitArrayAccess;
use PhpBrasil\Collection\Resources\TraitCountable;
use PhpBrasil\Collection\Resources\TraitIterator;
use PhpBrasil\Collection\Resources\TraitJsonSerializable;
use PhpBrasil\Collection\Resources\TraitSerialize;
use PhpBrasil\Collection\Resources\TraitTransform;
use Serializable;
use function PhpBrasil\Collection\Helper\stringify;

/**
 * Class Records
 * @package PhpBrasil\Collection
 */
class Records implements ArrayAccess, Serializable, Countable, Iterator, JsonSerializable
{
    /**
     * @see TraitTransform
     */
    use TraitTransform;

    /**
     * @see TraitArrayAccess
     */
    use TraitArrayAccess;

    /**
     * @see TraitSerialize
     */
    use TraitSerialize;

    /**
     * @see TraitCountable
     */
    use TraitCountable;

    /**
     * @see TraitIterator
     */
    use TraitIterator;

    /**
     * @see TraitJsonSerializable
     */
    use TraitJsonSerializable;

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
}
