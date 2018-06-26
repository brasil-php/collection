<?php

namespace PhpBrasil\Collection\Test\Pack;

use PhpBrasil\Collection\Pack;
use PHPUnit\Framework\TestCase;
use function PhpBrasil\Collection\Helper\search;

/**
 * Class TransformPluckTest
 * @package PhpBrasil\Collection\Test\Pack
 */
class TransformPluckTest extends TestCase
{
    /**
     * @SuppressWarnings(CamelCase)
     */
    public function test()
    {
        $pluck = Pack::create([['element' => ['name' => 'acme'], 'ignore' => 'me']])->pluck('element');
        $array = $pluck->records();
        $this->assertEquals(search( $array, '0.name'), 'acme', "Have value 'acme' on '{$pluck}'");
    }
}
