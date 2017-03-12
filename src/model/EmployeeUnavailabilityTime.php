<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 13/02/2017
 * Time: 23:08
 */

namespace Itb\model;


class EmployeeUnavailabilityTime
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
    private $dayOfWeek;

    /**
     * @return mixed
     */
    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    /**
     * @param mixed $dayOfWeek
     */
    public function setDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek = $dayOfWeek;
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
    private $unavailabilityReason;

    /**
     * @return mixed
     */
    public function getUnavailabilityReason()
    {
        return $this->unavailabilityReason;
    }

    /**
     * @param mixed $unavailabilityReason
     */
    public function setUnavailabilityReason($unavailabilityReason)
    {
        $this->unavailabilityReason = $unavailabilityReason;
    }


}