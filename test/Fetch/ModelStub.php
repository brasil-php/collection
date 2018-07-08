<?php

namespace PhpBrasil\Collection\Test\Fetch;

use PhpBrasil\Collection\Contract\RecordInterface;

/**
 * Class ModelStub
 * @package PhpBrasil\Collection\Test\Fetch
 */
class ModelStub implements RecordInterface
{
    /**
     * @var array
     */
    protected $record = [];

    /**
     * @param mixed $record
     * @return mixed
     */
    public function fillWithRecord($record)
    {
        return $this->record = $record;
    }

    /**
     * @return mixed
     */
    public function dumpRecord()
    {
        return $this->record;
    }
}
