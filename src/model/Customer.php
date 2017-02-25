<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 13/02/2017
 * Time: 23:07
 */

namespace Itb\model;

class Customer
{

    private $id;



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    private $customerName;

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
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param mixed $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
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

    /**
     * @return mixed
     */

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
    private $mainContact;

    /**
     * @return mixed
     */
    public function getMainContact()
    {
        return $this->mainContact;
    }

    /**
     * @param mixed $mainContact
     */
    public function setMainContact($mainContact)
    {
        $this->mainContact = $mainContact;
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
}