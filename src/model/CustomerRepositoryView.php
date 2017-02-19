<?php
// see Documentation folder for generated API doc for this class ...


namespace Itb\Model;

use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

/**
 * Class CustomerRepository
 * class to store and serve Customer objects (bit like a memory-only database ...)
 * @package Itb
 */
class CustomerRepositoryView extends DatabaseTableRepository
{
    public function __construct()
    {
        $namespace = 'Itb\Model';
        $classNameForDbRecords = 'Customer';
        $tableName = 'customerdetails';
        parent::__construct($namespace, $classNameForDbRecords, $tableName);
    }
}
