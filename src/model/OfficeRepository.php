<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 20/02/2017
 * Time: 23:05
 */

namespace Itb\model;

use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

class OfficeRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        $namespace = 'Itb\Model';
        $classNameForDbRecords = 'Office';
        $tableName = 'offices';
        parent::__construct($namespace, $classNameForDbRecords, $tableName);
    }
}
