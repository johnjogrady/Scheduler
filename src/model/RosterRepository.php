<?php

namespace Itb\Model;

use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

/**
 * Class CustomerRepository
 * class to store and serve Customer objects (bit like a memory-only database ...)
 * @package Itb
 */
class RosterRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        $namespace = 'Itb\Model';
        $classNameForDbRecords = 'Roster';
        $tableName = 'rosters';
        parent::__construct($namespace, $classNameForDbRecords, $tableName);
    }
}
