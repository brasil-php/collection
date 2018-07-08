<?php

namespace PhpBrasil\Collection\Test\Fetch;

use PhpBrasil\Collection\Fetch;
use PhpBrasil\Collection\Test\TestCaseCollection;
use function PhpBrasil\Collection\Helper\search;

/**
 * Class ArrayAccessGetTest
 * @package PhpBrasil\Collection\Test\Fetch
 */
class ArrayAccessGetTest extends TestCaseCollection
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

        $this->assertInstanceOf(ModelStub::class, $array[0], $array);

        if ($this->isVersionGreaterOrEqualsThan('7.1')) {
            $this->assertInstanceOf(ModelStub::class, search($array, 0), $array);
        }
    }
}
