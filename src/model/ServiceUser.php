<?php

namespace Itb\Model;


class ServiceUser
{
    private $id;

    /**
     * @return mixed
     */

    public function getId()
    {
        return $this->id;
    }
    private $firstName;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    private $lastName;

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
    private $latLonCoordinates;

    /**
     * @return mixed
     */
    public function getLatLonCoordinates()
    {
        return $this->latLonCoordinates;
    }

    /**
     * @param mixed $latLonCoordinates
     */
    public function setLatLonCoordinates($latLonCoordinates)
    {
        $this->latLonCoordinates = $latLonCoordinates;
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
    private $managingOffice;

    /**
     * @return mixed
     */
    public function getManagingOffice()
    {
        return $this->managingOffice;
    }

    /**
     * @param mixed $managingOffice
     */
    public function setManagingOffice($managingOffice)
    {
        $this->managingOffice = $managingOffice;
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
    private $startDate;

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
    private $finishDate;

    /**
     * @return mixed
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }

    /**
     * @param mixed $finishDate
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;
    }


}