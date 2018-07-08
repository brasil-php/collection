<?php

namespace PhpBrasil\Collection\Test\Pack;

use function PhpBrasil\Collection\Helper\prop;
use PhpBrasil\Collection\Pack;
use PhpBrasil\Collection\Test\TestCaseCollection;

/**
 * Class MutateTest
 * @package PhpBrasil\Collection\Test\Pack
 */
class MutateTest extends TestCaseCollection
{
    /**
     * @SuppressWarnings(CamelCase)
     */
    public function test()
    {
        $pack = Pack::create([
            [
                'name' => 'PHP',
                'note' => 10,
            ],
            [
                'name' => 'GO',
                'note' => 9,
            ],
            [
                'name' => 'C#',
                'note' => 8,
            ],
            [
                'name' => 'JAVA',
                'note' => 7,
            ],
        ]);

        $expected = [
            'languages' => [
                'PHP', 'GO', 'C#', 'JAVA',
            ],
            'notes' => [
                10, 9, 8, 7,
            ],
        ];
        $actual = $pack->reduce(function ($accumulator, $value, $key, $records) {
            $this->assertEquals($value, $records[$key], "{$key}");
            if (!isset($accumulator['languages'])) {
                $accumulator['languages'] = [];
            }
            if (!isset($accumulator['notes'])) {
                $accumulator['notes'] = [];
            }
            $accumulator['languages'][] = prop($value, 'name');
            $accumulator['notes'][] = prop($value, 'note');
            return $accumulator;
        });
        $this->assertEquals($expected, $actual, $pack);
    }
}
