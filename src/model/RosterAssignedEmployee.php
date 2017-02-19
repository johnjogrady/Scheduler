<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 13/02/2017
 * Time: 23:20
 */

namespace Itb\model;


class RosterAssignedEmployee
{
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    private $employeeId;

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    private $rosterId;

    /**
     * @return mixed
     */
    public function getRosterId()
    {
        return $this->rosterId;
    }

    /**
     * @param mixed $rosterId
     */
    public function setRosterId($rosterId)
    {
        $this->rosterId = $rosterId;
    }


}