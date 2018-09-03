<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 7:21
 */

namespace bumo\model\operation;


class AccountSetPrivilegeOperation extends OperationBase
{
    /**
     * @var string
     */
    private $masterWeight; //string
    /** @var array */
    private $signers; //Signer[]
    /** @var string */
    private $txThreshold; //string
    /** @var array */
    private $typeThresholds;

    /**
     * @return string
     */
    public function getMasterWeight()
    {
        return $this->masterWeight;
    }

    /**
     * @param string $masterWeight
     */
    public function setMasterWeight($masterWeight)
    {
        $this->masterWeight = $masterWeight;
    }

    /**
     * @return array
     */
    public function getSigners()
    {
        return $this->signers;
    }

    /**
     * @param array $signers
     */
    public function setSigners($signers)
    {
        $this->signers = $signers;
    }

    /**
     * @return string
     */
    public function getTxThreshold()
    {
        return $this->txThreshold;
    }

    /**
     * @param string $txThreshold
     */
    public function setTxThreshold($txThreshold)
    {
        $this->txThreshold = $txThreshold;
    }

    /**
     * @return array
     */
    public function getTypeThresholds()
    {
        return $this->typeThresholds;
    }

    /**
     * @param array $typeThresholds
     */
    public function setTypeThresholds($typeThresholds)
    {
        $this->typeThresholds = $typeThresholds;
    }//TypeThreshold[]


}