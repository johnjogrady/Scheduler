<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 13/02/2017
 * Time: 23:26
 */

namespace Itb\model;


class EmployeeAbsence
{
    private $id;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    private $startTime;

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }
    private $endTime;

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }
    private $approvalStatus;

    /**
     * @return mixed
     */
    public function getApprovalStatus()
    {
        return $this->approvalStatus;
    }

    /**
     * @param mixed $approvalStatus
     */
    public function setApprovalStatus($approvalStatus)
    {
        $this->approvalStatus = $approvalStatus;
    }
    private $absenceReason;

    /**
     * @return mixed
     */
    public function getAbsenceReason()
    {
        return $this->absenceReason;
    }

    /**
     * @param mixed $absenceReason
     */
    public function setAbsenceReason($absenceReason)
    {
        $this->absenceReason = $absenceReason;
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

    private $approvedBy;

    /**
     * @return mixed
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * @param mixed $approvedBy
     */
    public function setApprovedBy($approvedBy)
    {
        $this->approvedBy = $approvedBy;
    }


}