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

    private $customerId;

    /**
     * @return mixed
     */
    public function getcustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $numberResourcesNeeded
     */
    public function setcustomerId($customerId)
    {
        $this->customerId = $customerId;
    }


}