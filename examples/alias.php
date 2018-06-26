<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use function PhpBrasil\Collection\pack;

$array = pack([['name' => 'PHP']]);
echo 'with-pluck ~> ', $array->pluck('name'), ';', PHP_EOL;
echo 'original ~> ', $array, ';', PHP_EOL;

# [
#     "PHP"
# ];

# [
#     [
#         "name" => "PHP"
#     ]
# ];
