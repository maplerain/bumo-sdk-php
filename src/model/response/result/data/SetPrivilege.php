<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:42
 */

namespace bumo\model\response\result\data;


class SetPrivilege
{
    /**
     * @var string
     */
    private $masterWeight;
    /**
     * @var array
     */
    private $signers;
    /**
     * @var string
     */
    private $txThreshold;
    /**
     * @var array
     */
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
    public function getSigners()
    {
        return $this->signers;
    }

    /**
     * @param array $signers
     */
    public function setSigners($signers)
    {
        $this->signers = [];
        foreach ($signers as $signer){
            if($signer instanceof Signer){
                $this->signers[] = $signer;
            }else{
                $obj = new Signer();
                $obj->setAddress($signer->address);
                $obj->setWeight($signer->weight);
                $this->signers[] = $obj;
            }
        }
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
        $this->typeThresholds = [];
        foreach ($typeThresholds as $typeThreshold){
            if($typeThreshold instanceof TypeThreshold){
                $this->typeThresholds[] = $typeThreshold;
            }else{
                $obj = new TypeThreshold();
                $obj->setType($typeThreshold->type);
                $obj->setThreshold($typeThreshold->threshold);
                $this->typeThresholds[] = $obj;
            }
        }
    }
}