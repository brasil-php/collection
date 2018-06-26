<?php

namespace PhpBrasil\Collection\Test\Fetch;

use PhpBrasil\Collection\Fetch;
use PhpBrasil\Collection\Test\TestCaseCollection;

/**
 * Class ArrayAccessCurrentTest
 * @package PhpBrasil\Collection\Test\Fetch
 */
class ArrayAccessCurrentTest extends TestCaseCollection
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
        foreach ($array as $item) {
            $this->assertInstanceOf( ModelStub::class, $item, 'Instanceof stub');
        }
    }
}
