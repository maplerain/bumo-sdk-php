<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 1:40
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\Fees;

class BlockGetFeesResult
{
    /**
     * @var Fees
     */
    private $fees;

    /**
     * @return Fees
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @param Fees|\stdClass $fees
     */
    public function setFees($fees)
    {
        if($fees instanceof Fees){
            $this->fees = $fees;
        }else{
            $this->fees = new Fees();
            $this->fees->setBaseReserve(isset($fees->base_reserve)?$fees->base_reserve:0);
            $this->fees->setGasPrice(($fees->gas_price)?$fees->gas_price:0);
        }
    }


}