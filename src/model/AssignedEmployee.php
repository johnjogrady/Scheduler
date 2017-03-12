<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 13/02/2017
 * Time: 23:07
 */

namespace Itb\model;

class AssignedEmployee
{

    private $id;



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    private $serviceUserId;

    /**
     * @return mixed
     */
    public function getServiceUserId()
    {
        return $this->serviceUserId;
    }

    /**
     * @param mixed $serviceUserId
     */
    public function setServiceUserId($serviceUserId)
    {
        $this->serviceUserId = $serviceUserId;
    }

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
    private $employeeId;
}