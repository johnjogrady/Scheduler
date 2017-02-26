<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 25/02/2017
 * Time: 20:15
 */

namespace Itb\model;
use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;
use Mattsmithdev\PdoCrudRepo\ReadOnlyDatabaseTableRepository;


/**
     * Class EmployeeRepository
     * class to store and serve Employee objects (bit like a memory-only database ...)
     * @package Itb
     */
class EmployeeRepositoryView extends ReadOnlyDatabaseTableRepository
{
    public function __construct()
    {
        $namespace = 'Itb\Model';
        $classNameForDbRecords = 'Employee';
        $tableName = 'employeedetails';
        parent::__construct($namespace, $classNameForDbRecords, $tableName);
    }

}