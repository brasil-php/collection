<?php

namespace PhpBrasil\Collection\Test;

use PhpBrasil\Collection\Collection;
use PHPUnit\Framework\TestCase;

/**
 * Class CollectionCreationTest
 * @package PhpBrasil\Collection\Test
 */
class CollectionCreationTest extends TestCase
{
    /**
     * @SuppressWarnings(CamelCase)
     */
    public function test_create()
    {
        $array = Collection::create(['acme']);
        $this->assertArrayHasKey(0, $array, 'Array created');
    }
}
