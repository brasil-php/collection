<?php

namespace PhpBrasil\Collection;

/**
 * @param array $array
 * @return Pack
 */
function pack(array $array)
{
    return Pack::create($array);
}


/**
 * @param array $array
 * @param string $class
 * @return Fetch
 */
function fetch(array $array, $class)
{
    return Fetch::create($array, $class);
}
