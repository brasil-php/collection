<?php

namespace PhpBrasil\Collection\Test;

use PhpBrasil\Collection\Collection;
use PHPUnit\Framework\TestCase;
use function PhpBrasil\Collection\Helper\search;

/**
 * Class CollectionMethodsTest
 * @package PhpBrasil\Collection\Test
 */
class CollectionMethodsTest extends TestCase
{
    /**
     * @SuppressWarnings(CamelCase)
     */
    public function test_pluck()
    {
        $pluck = Collection::create([['element' => 'acme', 'ignore' => 'me']])->pluck('element');
        $array = $pluck->records();
        $this->assertEquals(search( $array, '0'), 'acme', "Have value 'acme' on '{$pluck}'");
    }
}
