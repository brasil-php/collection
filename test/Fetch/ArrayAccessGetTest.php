<?php

namespace PhpBrasil\Collection\Test\Fetch;

use PhpBrasil\Collection\Fetch;
use function PhpBrasil\Collection\Helper\prop;
use function PhpBrasil\Collection\Helper\search;
use PhpBrasil\Collection\Pack;
use PHPUnit\Framework\TestCase;

/**
 * Class ArrayAccessGetTest
 * @package PhpBrasil\Collection\Test\Fetch
 */
class ArrayAccessGetTest extends TestCase
{
    /**
     * @SuppressWarnings(CamelCase)
     */
    public function test()
    {
        $stubs = [
            ['name' => 'A'],
        ];
        $array = Fetch::create($stubs, ModelStub::class);
        $this->assertInstanceOf( ModelStub::class, $array[0], $array);
        $this->assertInstanceOf( ModelStub::class, search($array, 0), $array);
    }
}
