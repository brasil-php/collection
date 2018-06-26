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
        $pack = Pack::create([['element' => ['name' => 'acme'], 'ignore' => 'me']]);
        $pluck = $pack->pluck('element');
        $this->assertEquals(search( $pluck, '0.name'), 'acme', "Have value 'acme' on '{$pack}'");
    }
}
