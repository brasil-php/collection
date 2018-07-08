<?php

namespace PhpBrasil\Collection\Test\Pack;

use PhpBrasil\Collection\Pack;
use PhpBrasil\Collection\Test\TestCaseCollection;

/**
 * Class CreationTest
 * @package PhpBrasil\Collection\Test\Pack
 */
class CreationTest extends TestCaseCollection
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
