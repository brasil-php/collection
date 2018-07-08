<?php

namespace PhpBrasil\Collection\Test\Pack;

use PhpBrasil\Collection\Pack;
use PhpBrasil\Collection\Test\TestCaseCollection;

/**
 * Class ManipulateTest
 * @package PhpBrasil\Collection\Test\Pack
 */
class ManipulateTest extends TestCaseCollection
{
    /**
     * @SuppressWarnings(CamelCase)
     */
    public function test()
    {
        $pack = Pack::create([]);
        $this->assertEquals($pack->length(), 0, $pack);
        $this->assertEquals($pack->isEmpty(), true, $pack);

        $pack->push('acme');
        $this->assertEquals($pack->length(), 1, $pack);
        $this->assertEquals($pack->isEmpty(), false, $pack);

        $pack->pop();
        $this->assertEquals($pack->length(), 0, $pack);
        $this->assertEquals($pack->isEmpty(), true, $pack);

        $pack->push('B');
        $pack->prepend(['A']);
        $pack->append(['C']);
        $this->assertEquals($pack->length(), 3, $pack);
        $this->assertEquals($pack->records(), ['A', 'B', 'C'], $pack);
    }
}
