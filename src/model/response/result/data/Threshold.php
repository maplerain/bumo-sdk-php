<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:19
 */

namespace bumo\model\response\result\data;


class Threshold
{
    /**
     * @var int
     */
    private $txThreshold;  //Long       tx_threshold
    /**
     * @var array
     */
    private $typeThresholds;

    /**
     * @return int
     */
    public function getTxThreshold()
    {
        return $this->txThreshold;
    }

    /**
     * @param int $txThreshold
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