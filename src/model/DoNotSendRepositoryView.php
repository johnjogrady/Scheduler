<?php
// see Documentation folder for generated API doc for this class ...


namespace Itb\Model;

use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;
use Mattsmithdev\PdoCrudRepo\ReadOnlyDatabaseTableRepository;

/**
 * Class CustomerRepository
 * class to store and serve Customer objects (bit like a memory-only database ...)
 * @package Itb
 */
class DoNotSendRepositoryView extends ReadOnlyDatabaseTableRepository
{
    public function __construct()
    {
        $namespace = 'Itb\Model';
        $classNameForDbRecords = 'DoNotSend';
        $tableName = 'donotsenddetails';
        parent::__construct($namespace, $classNameForDbRecords, $tableName);
    }
}
