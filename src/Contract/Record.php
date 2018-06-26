<?php

namespace PhpBrasil\Collection\Contract;

/**
 * Interface Record
 * @package PhpBrasil\Collection\Contract
 */
interface Record
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