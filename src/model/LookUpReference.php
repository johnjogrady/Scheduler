<?php
/**
 * Created by PhpStorm.
 * User: john.ogrady
 * Date: 19/02/2017
 * Time: 14:19
 */

namespace Itb\model;


class LookUpReference
{
    private $refId;

    /**
     * @return mixed
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     * @param mixed $refId
     */
    public function setRefId($refId)
    {
        $this->refId = $refId;
    }

    /**
     * @return mixed
     */
    public function getRefValue()
    {
        return $this->refValue;
    }

    /**
     * @param mixed $refValue
     */
    public function setRefValue($refValue)
    {
        $this->refValue = $refValue;
    }

    /**
     * @return mixed
     */
    public function getRefItemId()
    {
        return $this->refItemId;
    }

    /**
     * @param mixed $refItemId
     */
    public function setRefItemId($refItemId)
    {
        $this->refItemId = $refItemId;
    }
    private $refValue;
    private $refItemId;
}