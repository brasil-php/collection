<?php

namespace PhpBrasil\Collection\Test\Pack;

use PhpBrasil\Collection\Pack;
use PHPUnit\Framework\TestCase;

/**
 * Class CreationTest
 * @package PhpBrasil\Collection\Test\Pack
 */
class CreationTest extends TestCase
{
    /**
     * @SuppressWarnings(CamelCase)
     */
    public function test()
    {
        $array = Pack::create(['acme']);
        $this->assertArrayHasKey(0, $array, 'Array created');
    }
}
