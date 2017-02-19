<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 13/02/2017
 * Time: 22:58
 */

namespace Itb\model;


class Roster
{
    private $id;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    private $rosterStartTime;

    /**
     * @return mixed
     */
    public function getRosterStartTime()
    {
        return $this->rosterStartTime;
    }

    /**
     * @param mixed $rosterStartTime
     */
    public function setRosterStartTime($rosterStartTime)
    {
        $this->rosterStartTime = $rosterStartTime;
    }
    private $rosterEndTime;

    /**
     * @return mixed
     */
    public function getRosterEndTime()
    {
        return $this->rosterEndTime;
    }

    /**
     * @param mixed $rosterEndTime
     */
    public function setRosterEndTime($rosterEndTime)
    {
        $this->rosterEndTime = $rosterEndTime;
    }
    private $rosterStatus;

    /**
     * @return mixed
     */
    public function getRosterStatus()
    {
        return $this->rosterStatus;
    }

    /**
     * @param mixed $rosterStatus
     */
    public function setRosterStatus($rosterStatus)
    {
        $this->rosterStatus = $rosterStatus;
    }
    private $numberResourcesNeeded;

    /**
     * @return mixed
     */
    public function getNumberResourcesNeeded()
    {
        return $this->numberResourcesNeeded;
    }

    /**
     * @param mixed $numberResourcesNeeded
     */
    public function setNumberResourcesNeeded($numberResourcesNeeded)
    {
        $this->numberResourcesNeeded = $numberResourcesNeeded;
    }



}