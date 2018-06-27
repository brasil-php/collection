<?php

namespace PhpBrasil\Collection\Contract;

/**
 * Interface RecordInterface
 * @package PhpBrasil\Collection\Contract
 */
interface RecordInterface
{
    /**
     * @param mixed $record
     * @return mixed
     */
    public function fillWithRecord($record);

    /**
     * @return mixed
     */
    public function dumpRecord();
}