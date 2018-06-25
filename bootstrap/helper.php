<?php

namespace PhpBrasil\Collection\Helper;

use ArrayAccess;

/**
 * @param mixed $input
 * @param string $indent
 * @return mixed|string
 */
function stringify($input, $indent = '')
{
    switch (gettype($input)) {
        case 'string':
            return '"' . addcslashes($input, "\\\$\"\r\n\t\v\f") . '"';
        case 'array':
            $indexed = array_keys($input) === range(0, count($input) - 1);
            $pieces = [];
            foreach ($input as $key => $value) {
                $pieces[] = "{$indent}    "
                    . ($indexed ? '' : stringify($key) . ' => ')
                    . stringify($value, "{$indent}    ");
            }
            return "[\n" . implode(",\n", $pieces) . "\n" . $indent . "]";
        case 'boolean':
            return $input ? 'TRUE' : 'FALSE';
    }
    return var_export($input, true);
}

/**
 * @param mixed $value
 * @param string|int $property (null)
 * @param mixed $default (null)
 *
 * @return mixed
 */
function prop($value, $property = null, $default = null)
{
    if (is_null($property)) {
        return $default;
    }

    if (!$value) {
        return $default;
    }

    if (is_array($value) && isset($value[$property])) {
        return $value[$property];
    }

    /** @noinspection PhpVariableVariableInspection */
    if (is_object($value) && isset($value->$property)) {
        /** @noinspection PhpVariableVariableInspection */
        return $value->$property;
    }

    return $default;
}

/**
 * @param array|ArrayAccess $context
 * @param array|string $path
 * @param mixed $default (null)
 * @return mixed|null
 */
function search($context, $path, $default = null)
{
    if (!is_array($path)) {
        $path = explode('.', $path);
    }
    foreach ($path as $piece) {
        if (!is_array($context) || !array_key_exists($piece, $context)) {
            return $default;
        }
        $context = $context[$piece];
    }
    return $context;
}
