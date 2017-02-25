<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 13/02/2017
 * Time: 22:56
 */

namespace Itb\model;


class Office
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
    private $officeName;

    /**
     * @return mixed
     */
    public function getOfficeName()
    {
        return $this->officeName;
    }

    /**
     * @param mixed $officeName
     */
    public function setOfficeName($officeName)
    {
        $this->officeName = $officeName;
    }

    private $addressLine1;

    /**
     * @return mixed
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param mixed $addressLine1
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    }
    private $addressLine2;

    /**
     * @return mixed
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param mixed $addressLine2
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    }
    private $addressLine3;

    /**
     * @return mixed
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * @param mixed $addressLine3
     */
    public function setAddressLine3($addressLine3)
    {
        $this->addressLine3 = $addressLine3;
    }
    private $countyPostcode;

    /**
     * @return mixed
     */
    public function getCountyPostcode()
    {
        return $this->countyPostcode;
    }

    /**
     * @param mixed $countyPostcode
     */
    public function setCountyPostcode($countyPostcode)
    {
        $this->countyPostcode = $countyPostcode;
    }
    private $eirCode;

    /**
     * @return mixed
     */
    public function getEirCode()
    {
        return $this->eirCode;
    }

    /**
     * @param mixed $eirCode
     */
    public function setEirCode($eirCode)
    {
        $this->eirCode = $eirCode;
    }
    private $landlineTelephone;

    /**
     * @return mixed
     */
    public function getLandlineTelephone()
    {
        return $this->landlineTelephone;
    }

    /**
     * @param mixed $landlineTelephone
     */
    public function setLandlineTelephone($landlineTelephone)
    {
        $this->landlineTelephone = $landlineTelephone;
    }
    private $mobileTelephone;

    /**
     * @return mixed
     */
    public function getMobileTelephone()
    {
        return $this->mobileTelephone;
    }

    /**
     * @param mixed $mobileTelephone
     */
    public function setMobileTelephone($mobileTelephone)
    {
        $this->mobileTelephone = $mobileTelephone;
    }
    private $isActive;

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }



}