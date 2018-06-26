<?php

namespace PhpBrasil\Collection;

use PhpBrasil\Collection\Resources\TraitManipulate;

/**
 * Class Pack
 * @package PhpBrasil\Collection
 */
class Pack extends Records
{
    /**
     * @see TraitManipulate
     */
    use TraitManipulate;

    /**
     * @param array $array
     * @return Pack
     */
    public static function create(array $array = [])
    {
        return new static($array);
    }
}
