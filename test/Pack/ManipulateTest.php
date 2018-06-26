<?php

namespace PhpBrasil\Collection\Test\Pack;

use PhpBrasil\Collection\Pack;
use PHPUnit\Framework\TestCase;

/**
 * Class ManipulateTest
 * @package PhpBrasil\Collection\Test\Pack
 */
class ManipulateTest extends TestCase
{
    /**
     * @SuppressWarnings(CamelCase)
     */
    public function test()
    {
        $pack = Pack::create([]);
        $this->assertEquals($pack->length(), 0, "Records is not empty '{$pack}'");
        $this->assertEquals($pack->isEmpty(), true, "Records is not empty '{$pack}'");

        $pack->push('acme');
        $this->assertEquals($pack->length(), 1, "Records is empty '{$pack}'");
        $this->assertEquals($pack->isEmpty(), false, "Records is empty '{$pack}'");


        $pack->pop();
        $this->assertEquals($pack->length(), 0, "Records is not empty '{$pack}'");
        $this->assertEquals($pack->isEmpty(), true, "Records is not empty '{$pack}'");
    }
}
