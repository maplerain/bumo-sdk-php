<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:27
 */

namespace bumo\model\response\result\data;


class Priv
{
    /**
     * @var string
     */
    private $masterWeight; //String  master_weight
    /**
     * @var array
     */
    private $signers;  //Signer[]   signers
    /**
     * @var Threshold
     */
    private $threshold;

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
        $this->signers = [];
        var_dump($signers);
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
     * @return Threshold
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

    /**
     * @param Threshold $threshold
     */
    public function setThreshold($threshold)
    {
        $thresholdOb = new Threshold();
        $thresholdOb->setTxThreshold(isset($threshold->tx_threshold)?$threshold->tx_threshold:'');
        if(isset($threshold->type_thresholds))
            $thresholdOb->setTypeThresholds($threshold->type_thresholds);

        $this->threshold = $thresholdOb;

    } //Threshold   thresholds

}