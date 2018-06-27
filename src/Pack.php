<?php

namespace PhpBrasil\Collection;

use PhpBrasil\Collection\Resources\ManipulateTrait;

/**
 * Class Pack
 * @package PhpBrasil\Collection
 */
class Pack extends Records
{
    /**
     * @see ManipulateTrait
     */
    use ManipulateTrait;

    /**
     * @param array $array
     * @return Pack
     */
    public static function create(array $array = [])
    {
        return new static($array);
    }
}
