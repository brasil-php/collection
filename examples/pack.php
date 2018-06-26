<?php

use PhpBrasil\Collection\Pack;
use function PhpBrasil\Collection\Helper\stringify;
use function PhpBrasil\Collection\pack;

require dirname(__DIR__) . '/vendor/autoload.php';

$pack = Pack::create(['PHP']);
foreach ($pack as $item) {
    echo 'item ~> ', $item, ';', PHP_EOL;
}

echo 'filter ~> ', Pack::create(['A', '', 'C'])->filter(), ';', PHP_EOL;

$filter = function ($value, $key) {
    if (!$value) {
        return false;
    }
    if (!$key) {
        return false;
    }
    return true;
};

$map = function ($value) {
    return "Letter: {$value}";
};
echo 'map ~> ', Pack::create(['A', '', 'C'])->filter($filter)->map($map), ';', PHP_EOL;

$reduce = function ($accumulate, $value, $key) {
    $accumulate = $accumulate + $key;
    return $accumulate;
};

$array = stringify(
    pack(['A', '', 'C'])
        ->map($map)
        ->reduce($reduce)
);
echo 'reduce ~> ', $array, ';', PHP_EOL;
