<?php
// see Documentation folder for generated API doc for this class ...


namespace Itb\Model;

use Mattsmithdev\PdoCrudRepo\ReadOnlyDatabaseTableRepository;

/**
 * Class CustomerRepository
 * class to store and serve Customer objects (bit like a memory-only database ...)
 * @package Itb
 */
class LookUpReferenceRepositoryRosterStatus extends ReadOnlyDatabaseTableRepository
{
    public function __construct()
    {
        $namespace = 'Itb\Model';
        $classNameForDbRecords = 'LookUpReference';
        $tableName = 'rosterstatus';// counties is an SQL view filtered on the lookupreference table to only extract roster status values

        parent::__construct($namespace, $classNameForDbRecords, $tableName);
    }
}
